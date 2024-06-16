<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Publicações</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .carousel-item {
            height: 60vh;
            background-size: cover;
            background-position: center;
        }
        .article-card {
            margin-bottom: 20px;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        .fixed-sidebar {
            position: sticky;
            top: 70px;
        }
        .content {
            padding-top: 70px;
        }

        #carouselExampleIndicators img{
            
            height: 450px;
            width: 100%;
            object-fit: ccover;

        }
        .carousel-inner{
            max-height: 450px;
            margin-top: 25px;
        }

    </style>
</head>
<body>
    <!-- Cabeçalho -->
    <header class="bg-dark text-white fixed-top ">
        <div class="container">
           <nav class="navbar bg-body shadow p-3 mb-3 bg-body-tertiary navbar-expand-lg fixed-top" >
              <div class="container-fluid">
                <a class="navbar-brand" href="/">BSOFT NEWS </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                  <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">BSOFT-NEWS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                      </li>

                       <li class="nav-item">
                        <a class="nav-link" href="/posts">Posts</a>
                      </li>

                    
                     <li class="nav-item">
                        <a class="nav-link" href="/about">Sobre </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/signup">Criar Conta</a>
                      </li>

                       <li class="nav-item">
                        <a class="nav-link" href="/login">Entrar</a>
                      </li>

                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          baptistadev411@gmail.com
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Olá,John Winner</a></li>
                          <li><a class="dropdown-item" href="/profile">Perfil</a></li>
                         
                          <li>
                            <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="/logout">Sair</a></li>
                        </ul>
                      </li>
                    </ul>
                    <form class="d-flex mt-2" role="search">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                  </div>
                </div>
              </div>
            </nav>
        </div>
    </header>