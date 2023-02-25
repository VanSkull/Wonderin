@extends('layout.template')

@section('content')
    <div class="page-all-category">

        <section class="recent-searches">
            <h2>Recherches récentes</h2>
            <div class="recent-searches__all-searches">
                <i class='fas fa-search'></i>
                <ul>
                    <li><a href="/search/Surprise">Surprise</a></li>
                    <li><a href="/search/Monet">Monet</a></li>
                    <li><a href="/search/Paranormal">Paranormal</a></li>
                    <li><a href="/search/Aventure">Aventure</a></li>
                    <li><a href="/search/Victor Hugo">Victor Hugo</a></li>
                    <li><a href="/search/Politique">Politique</a></li>
                    <li><a href="/search/John Green">John Green</a></li>
                    <li><a href="/search/Amour">Amour</a></li>
                    <li><a href="/search/Italien">Italien</a></li>
                    <li><a href="/search/Peur">Peur</a></li>
                    <li><a href="/search/Cuisine">Cuisine</a></li>
                </ul>
            </div>
        </section>

        <section class="main-contain">
            <div class="circle-1" style="
            display: inline-block;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 8px solid #901B22;
            background-color: transparent;
            "></div>
            <div class="circle-2" style="
            display: inline-block;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 8px solid #901B22;
            background-color: #FFFFFF;
            "></div>
            <div class="circle-3" style="
            display: inline-block;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 12px solid #901B22;
            background-color: #FFFFFF;
            "></div>
            <div class="circle-4" style="
            display: inline-block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 4px solid #901B22;
            background-color: #FFFFFF;
            "></div>
            <div class="circle-5" style="
            display: inline-block;
            width: 128px;
            height: 128px;
            border-radius: 50%;
            border: 12px solid #901B22;
            background-color: #FFFFFF;
            "></div>
            <div class="circle-6" style="
            display: inline-block;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 16px solid #901B22;
            background-color: #FFFFFF;
            "></div>
            <div class="circle-7" style="
            display: inline-block;
            width: 85px;
            height: 85px;
            border-radius: 50%;
            border: 8px solid #901B22;
            background-color: #FFFFFF;
            "></div>
            <div class="container">
                <h1>Toutes nos catégories</h1>                
                <ul>
                    @foreach($allCategories as $category)
                    {{-- <li><a href="/category/{{ strtolower($category->name) }}">{{$category->name}}</a></li> --}}
                    <li>
                        <div onclick="viewCategory('{{ strtolower($category->name) }}');">
                            <p>{{ $category->name }}</p>
                            <img src="/images/categories/category_{{ $category->id }}.png" alt="Image_{{ $category->name }}">
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
@endsection