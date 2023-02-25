@extends('layout.template')

@section('content')
    <div class="page-about">
        <section class="section-intro">
            <h1>À propos de nous</h1>
        </section>
        
        <section class="main-contain">
            <div class="circle-1" style="
            display: inline-block;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 16px solid #901B22;
            background-color: transparent;
            "></div>
            <div class="circle-2" style="
                display: inline-block;
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 10px solid #901B22;
                background-color: transparent;
                "></div>
            <div class="circle-3" style="
                display: inline-block;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                border: 5px solid #901B22;
                background-color: transparent;
                "></div>
            <div class="container">
                <h2>Régles générales</h2>
                <h3>Utilisation du site</h3>
                <p>Ce site a pour but d'être utilisé à bon escient. Il en convient alors pour tous les utilisateurs du site d'être responsable de leurs actes et de faire attention pendant leur navigation sur ce site.</p>
                <h3>Compte utilisateur</h3>
                <p>Chaque utilisateur est libre de se créer un compte utilisateur ou non pour son intérêt personnel et pour partager sa passion pour le litérature. Sachant que la création d'un compte utilisateur offre de nouvelles fonctionnalités sur le site pour l'utilisateur tel que la possibilité de suivre d'autres utilisateurs, créer des books, créer des threads, commenter des threads et liker des books.</p>
                <p><br/></p>
                <h2>Mentions légales</h2>
                <p>Ce site a été créé en utilisant le framework PHP "Laravel".</p>
                <p>Ce site est l'œuvre de Valentin VANHAECKE (développeur full-stack) et de Eva VILLALOBOS MONTSE PÉREZ (graphiste et développeur front-end) et a pour but d'évaluer leur compétence dans la création de site web complexe en utilisant Laravel.</p>
                <p><br/></p>
                <p>Vous êtes arrivés jusque ici... qu'est-ce que vous faîtes encore ici ? Il n'y a plus rien à voir. Circulez !!!</p>
            </div>
        </section>
    </div>

@endsection