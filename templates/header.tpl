<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TURNO Fácil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a7023aac14.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-image: url('img/fondo.jpeg'); background-size: 1500px 950px;">
    <header class="mb-4">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand" style="color: white;" href="login">TURNO Fácil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText" >
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex w-100">
                        
                        <li class="nav-item" >
                            <a class="nav-link active" aria-current="page" href="login" style="color: white;" >Home</a>
                        </li>
                       <li class="nav-item ms-auto">
                       <div class="d-flex align-items-center">
                        {if isset($smarty.session.USER_NAME)} 
                            <div class="d-flex align-items-center" style="color: white;" >
                                <span>{$smarty.session.USER_NAME}</span>
                                <a class="nav-link " aria-current="page" href="logout" style="color: white;" > Logout</a>
                            </div>
                            
                        {else}
                                <div class="d-flex align-items-center" >
                                <a class="nav-link " aria-current="page" href="login" style="color: white;" >Ingresar</a>
                                
                                </div>
                        {/if}
                        {if isset($smarty.session.USER_EMAIL)}
                            <div class="d-flex align-items-center" style="color: white;" >
                                <span>{$smarty.session.USER_EMAIL} </span>
                                <a class="nav-link " aria-current="page" href="logout" style="color: white;"> Logout</a>
                            </div>
                        {else}
                            <div class="d-flex align-items-center">
                                <a class="nav-link " aria-current="page" href="loginResponsable" style="color: white;">Ingreso Privado</a>
                                
                            </div>
                        {/if}
                       </div>
                        </li>
                        <li class="nav-item ms-auto" style="color: white;" >
                        {if !isset($smarty.session.USER_ID)}
                            <a class="nav-link " aria-current="page" href="registarse" style="color: white;">Registrar</a>
                        {/if}
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>