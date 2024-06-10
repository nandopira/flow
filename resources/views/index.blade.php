@extends('layouts.classic.masterpage')


@section('content')
<style>
        body {
            font-family: Arial, sans-serif;
        }
        .timeline {
            list-style: none;
            padding: 0;
        }
        .timeline-item {
            margin-bottom: 20px;
            padding-left: 40px;
            position: relative;
        }
        .timeline-item:before {
            content: "";
            background-color: #007bff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            position: absolute;
            left: 0;
            top: 0;
        }
        .timeline-item .time {
            font-size: 12px;
            color: #6c757d;
        }
        .timeline-item .content {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            position: relative;
        }
    </style>
<div class="container mt-5">
        <h1 class="text-center">Bem vindo ao sistema de gestão de obras da<br> Prefeitura do campus "Luiz de Queiroz"</h1>
        <p class="text-center">Acompanhe as obras do campus</p>
        <h2>Últimas atualizações</h2>
        <ul class="timeline">
            <li class="timeline-item">
                <div class="time">2024-05-01</div>
                <div class="content">Início das obras no bloco A. Preparação do terreno concluída.</div>
            </li>
            <li class="timeline-item">
                <div class="time">2024-05-10</div>
                <div class="content">Entrega dos materiais de construção para o bloco B.</div>
            </li>
            <li class="timeline-item">
                <div class="time">2024-05-15</div>
                <div class="content">Início da construção das fundações no bloco A.</div>
            </li>
            <li class="timeline-item">
                <div class="time">2024-05-20</div>
                <div class="content">Conclusão da terraplanagem no bloco C.</div>
            </li>
            <li class="timeline-item">
                <div class="time">2024-05-25</div>
                <div class="content">Instalação da rede elétrica no bloco B.</div>
            </li>
        </ul>
    </div>
@endsection
