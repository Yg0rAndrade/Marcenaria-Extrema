<?php
    require 'config.php';
    require 'vendor/autoload.php';

    $msg = ''; 
    $e = '';


    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = isset($_POST['email']) ? $_POST['email'] : NULL;
        $password = isset($_POST['password']) ? $_POST['password'] : NULL;

        $Client = new GuzzleHttp\Client();

        $body = [
            'email' => $email,
            'password' => $password
        ];

        try{
            // URL correta para a rota de signup do Supabase
            $response = $Client->post(
                'https://inftqfcizgvxntcipxvr.supabase.co/auth/v1/signup', 
                [
                    'headers' => getHeader(),
                    'body' => json_encode($body),
                    'verify' => false
                ]
            );
            $data = json_decode($response->getBody());

            // Verifica se o usuário foi criado
            if (isset($data->id)) {
                $msg = 'Usuário ' . $data->email . ' criado com sucesso';
            } else {
                $msg = 'Erro ao criar o usuário';
            }
        } catch (GuzzleHttp\Exception\RequestException $ex) {
            if ($ex->hasResponse()) {
                $statusCode = $ex->getResponse()->getStatusCode();
                if ($statusCode == 400) {
                    $e = 'Usuário já cadastrado'; 
                } elseif ($statusCode == 422) {
                    $res = json_decode($ex->getResponse()->getBody());
                    $e = $res->msg; 
                } else {
                    $e = 'Erro: ' . $statusCode;
                }
            } else {
                $e = 'Erro de requisição: ' . $ex->getMessage();
            }
        }
    }
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .custom-form {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            color: #b8860b; /* Dourado escuro */
            font-weight: bold; /* Deixa o rótulo mais visível */
        }
        .form-control {
            border: 2px solid #b8860b; /* Dourado escuro com borda mais grossa */
            border-radius: 4px;
            padding: 10px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #8b6508; /* Tom mais escuro de dourado */
        }
        .btn-custom {
            background-color: #b8860b;
            border-color: #b8860b;
            color: #fff;
            padding: 10px;
        }
        .btn-custom:hover {
            background-color: #8b6508;
            border-color: #8b6508;
        }
    </style>
</head>
<body>

    <div class="custom-form">
        <h2>Cadastro</h2>
        <p><?php echo $msg; echo $e; ?></p> <!-- Exibe as mensagens de sucesso ou erro -->
        <form method="POST" action="#">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
            </div>
            <input type="submit" name="submit" id="submit" class="btn btn-custom w-100"></input>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF6NI5KzLmf2xW2dBwjKv35RdDxFJS71zfMgd0jqBxM" crossorigin="anonymous"></script>
</body>
</html>
