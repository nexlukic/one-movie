@extends('layouts.front');
@section('content')
    <div class="faq">
        <h4 class="latest-text w3_faq_latest_text w3_latest_text">Movies List</h4>
        <div class="container">
            <div class="agileits-news-top">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">List</li>
                </ol>
            </div>
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation"><a class="sortiranje" href="#a" role="tab" id="a-tab" data-toggle="tab" aria-controls="a">A</a></li>
                    <li role="presentation"><a class="sortiranje" href="#b" role="tab" id="b-tab" data-toggle="tab" aria-controls="b">B</a></li>
                    <li role="presentation"><a class="sortiranje" href="#c" role="tab" id="c-tab" data-toggle="tab" aria-controls="c">C</a></li>
                    <li role="presentation"><a class="sortiranje" href="#d" role="tab" id="d-tab" data-toggle="tab" aria-controls="d">D</a></li>
                    <li role="presentation"><a class="sortiranje" href="#e" role="tab" id="e-tab" data-toggle="tab" aria-controls="e">E</a></li>
                    <li role="presentation"><a class="sortiranje" href="#f" role="tab" id="f-tab" data-toggle="tab" aria-controls="f">F</a></li>
                    <li role="presentation"><a class="sortiranje" href="#g" role="tab" id="g-tab" data-toggle="tab" aria-controls="g">G</a></li>
                    <li role="presentation"><a class="sortiranje" href="#h" role="tab" id="h-tab" data-toggle="tab" aria-controls="h">H</a></li>
                    <li role="presentation"><a class="sortiranje" href="#i" role="tab" id="i-tab" data-toggle="tab" aria-controls="i">I</a></li>
                    <li role="presentation"><a class="sortiranje" href="#j" role="tab" id="j-tab" data-toggle="tab" aria-controls="j">J</a></li>
                    <li role="presentation"><a class="sortiranje" href="#k" role="tab" id="k-tab" data-toggle="tab" aria-controls="k">K</a></li>
                    <li role="presentation"><a class="sortiranje" href="#l" role="tab" id="l-tab" data-toggle="tab" aria-controls="l">L</a></li>
                    <li role="presentation"><a class="sortiranje" href="#m" role="tab" id="m-tab" data-toggle="tab" aria-controls="m">M</a></li>
                    <li role="presentation"><a class="sortiranje" href="#n" role="tab" id="n-tab" data-toggle="tab" aria-controls="n">N</a></li>
                    <li role="presentation"><a class="sortiranje" href="#o" role="tab" id="o-tab" data-toggle="tab" aria-controls="o">O</a></li>
                    <li role="presentation"><a class="sortiranje" href="#p" role="tab" id="p-tab" data-toggle="tab" aria-controls="p">P</a></li>
                    <li role="presentation"><a class="sortiranje" href="#q" role="tab" id="q-tab" data-toggle="tab" aria-controls="q">Q</a></li>
                    <li role="presentation"><a class="sortiranje" href="#r" role="tab" id="r-tab" data-toggle="tab" aria-controls="r">R</a></li>
                    <li role="presentation"><a class="sortiranje" href="#s" role="tab" id="s-tab" data-toggle="tab" aria-controls="s">S</a></li>
                    <li role="presentation"><a class="sortiranje" href="#t" role="tab" id="t-tab" data-toggle="tab" aria-controls="t">T</a></li>
                    <li role="presentation"><a class="sortiranje" href="#u" role="tab" id="u-tab" data-toggle="tab" aria-controls="u">U</a></li>
                    <li role="presentation"><a class="sortiranje" href="#v" role="tab" id="v-tab" data-toggle="tab" aria-controls="v">V</a></li>
                    <li role="presentation"><a class="sortiranje" href="#w" role="tab" id="w-tab" data-toggle="tab" aria-controls="w">W</a></li>
                    <li role="presentation"><a class="sortiranje" href="#x" role="tab" id="x-tab" data-toggle="tab" aria-controls="x">X</a></li>
                    <li role="presentation"><a class="sortiranje" href="#y" role="tab" id="y-tab" data-toggle="tab" aria-controls="y">Y</a></li>
                    <li role="presentation"><a class="sortiranje" href="#z" role="tab" id="z-tab" data-toggle="tab" aria-controls="z">Z</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">

                    <div role="tabpanel">
                        <div class="agile-news-table">
                            <table id="table-breakpoint1">
                                 @if($errors->any())
                                    <h1 class="text-danger">{{$errors->first()}}</h1>
                                @endif
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Movie Name</th>
                                    <th>date added</th>
                                    <th>Genre</th>
                                </tr>
                                </thead>
                                <tbody id="lista">

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    @endsection