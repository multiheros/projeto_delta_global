<?php

namespace App\Models;

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function getUsers()
    {
        return view('header')
        . view('users', [
            'users' => $this->userModel->findAll()
        ]);
    }

    public function registerUser()
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

                return view('register_user', $data);
            }

            $img = $this->request->getFile('picture');

            // Converte para base 64
            $filepath = $img->getPathname();
            $type = pathinfo($filepath, PATHINFO_EXTENSION);
            $data = file_get_contents($filepath);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

            // Instancia os valores a serem salvos no banco de dados
            $this->userModel->set('name', $this->request->getPost('name'));
            $this->userModel->set('andress', $this->request->getPost('andress'));
            $this->userModel->set('picture', $base64);

            // Insere no banco de dados
            if($this->userModel->insert()) {
                return view('register_user', ['errors' => ['Tudo certo']]);
            } else {
                return view('register_user', ['errors' => ['Erro ao inserir']]);
            }
        }

        return view('header')
        . view('register_user', ['errors' => []]);
    }
}
