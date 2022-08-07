<?php

namespace App\Models;

namespace App\Controllers;

use App\Models\AlunoModel;

class Aluno extends BaseController
{
    private $alunoModel;

    public function __construct()
    {
        $this->alunoModel = new AlunoModel();
    }

    /**
     * Método responsável por montar a view do *lista de alunos*
     * @return view contendo os dados dos alunos.
     */
    public function getAlunos()
    {
        return view('header')
        . view('alunos', [
            'alunos' => $this->alunoModel->findAll()
        ]);
    }

    /**
     * Método responsável por montar a view *cadastro aluno*
     * @return view e as informações referentes ao status do processo.
     */
    public function setAlunos()
    {
        if ($this->request->getPost()) {
            // Regra de validação da imagem
            $validationRule = [
                'picture' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[picture]'
                        . '|is_image[picture]'
                        . '|mime_in[picture,image/png]'
                        . '|max_size[picture,1000]',
                ],
            ];

            // Verifica se a imagem é valida
            if (!$this->validate($validationRule)) {
                $data = ['errors' => $this->validator->getErrors()];

                return view('header') . view('cadastrar_aluno', $data);
            }

            $img = $this->request->getFile('picture');

            // Converte para base 64
            $filepath = $img->getPathname();
            $type = pathinfo($filepath, PATHINFO_EXTENSION);
            $data = file_get_contents($filepath);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

            // Instancia os valores a serem salvos no banco de dados
            $this->alunoModel->set('name', $this->request->getPost('name'));
            $this->alunoModel->set('andress', $this->request->getPost('andress'));
            $this->alunoModel->set('picture', $base64);

            // Insere no banco de dados
            if($this->alunoModel->insert()) {
                return view('header') . view('cadastrar_aluno', ['errors' => ['Aluno cadastrado com sucesso!']]);
            } else {
                return  view('header'). view('cadastrar_aluno', ['errors' => ['Erro ao cadastrar aluno']]);
            }
        }

        return view('header')
        . view('cadastrar_aluno', ['errors' => []]);
    }
}
