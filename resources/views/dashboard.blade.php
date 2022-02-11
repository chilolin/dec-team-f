<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="content">
        <div class="container">


            <form method="GET">
            @csrf
            <h4>
                ctrlボタン・<i class="bi bi-command">ボタン</i>を押しながら選択で複数選択が可能です
            </h4>

            <div class="row row-cols-1 row-cols-md-3">

            <div class="col mb-4">
                <div class="card border-primary mb-3 h-100" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">プログラミング言語</h5>
                        <p class="card-text">
                        This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                        </p>
                    </div>

                    <div class="card-footer">
                        <select class="form-select form-control text-center" size="5"  multiple aria-label=" .form-select-lg example">
                            <option value="Bash">
                            Bash</option>
                            <option value="C">
                            C</option>
                            <option value="C#">
                            C#</option>
                            <option value="C++">
                            C++</option>
                            <option value="CSS">
                            CSS</option>
                            <option value="Clojure">
                            Clojure</option>
                            <option value="Cobol">
                            Cobol</option>
                            <option value="CoffeScript">
                            CoffeScript</option>
                            <option value="D">
                            D</option>
                            <option value="Elixir">
                            Elixir</option>
                            <option value="ERlang">
                            Erlang</option>
                            <option value="F#">
                            F#</option>
                            <option value="Go">
                            Go</option>
                            <option value="Haskell">
                            Haskell</option>
                            <option value="HTML">
                            HTML</option>
                            <option value="Java">
                            Java</option>
                            <option value="JavaScript">
                            JavaScript</option>
                            <option value="Kotlin">
                            Kotlin</option>
                            <option value="MySQL">
                            MySQL</option>
                            <option value="Nadesiko">
                            Nadesiko</option>
                            <option value="Objective-C">
                            Objective-C</option>
                            <option value="Pearl">
                            Pearl</option>
                            <option value="PHP">
                            PHP</option>
                            <option value="Python2">
                            Python2</option>
                            <option value="Python3">
                            Python3</option>
                            <option value="R">
                            R</option>
                            <option value="Ruby">
                            Ruby</option>
                            <option value="Scala">
                            Scala</option>
                            <option value="Scheme">
                            Scheme</option>
                            <option value="Swift">
                            Swift</option>
                            <option value="TypeScript">
                            TypeScript</option>
                            <option value="VB">
                            VB</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="card border-danger mb-3 h-100" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">フレームワーク</h5>
                        <p class="card-text">
                            説明
                        </p>
                    </div>

                    <div class="card-footer">
                        <select class="form-select form-control text-center" size="5"  multiple aria-label=" .form-select-lg example">
                            <option value="Ruby on Rails">
                            Ruby on Rails</option>
                            <option value="Sinatra">
                            Sinatra</option>
                            <option value="Padrino">
                            Padrino</option>

                            <option value="Laravel">
                            Laravel</option>
                            <option value="CakePHP">
                            CakePHP</option>
                            <option value="FuelPHP">
                            FuelPHP</option>

                            <option value="Spring Framework">
                            Spring Framework</option>
                            <option value="PlayFramwork">
                            PlayFramework</option>
                            <option value="JSF(JavaServer Faces">
                            JSF(JavaServer Faces)</option>

                            <option value="AngularJS">
                            AngularJS</option>
                            <option value="Vue.js">
                            Vue.js</option>
                            <option value="React">
                            React</option>

                            <option value="Booststrap">
                            Bootstrap</option>
                            <option value="Foundation">
                            Foundation</option>
                            <option value="UIkit">
                            UIkit</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="card border-warning mb-3 h-100" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">デザインパターン</h5>
                        <p class="card-text">
                            説明
                        </p>
                    </div>

                    <div class="card-footer">
                        <select class="form-select form-control text-center" size="5"  multiple aria-label=" .form-select-lg example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="col mb-4">
                <div class="card border-success mb-3 h-100" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">開発工程</h5>
                        <p class="card-text">
                            説明
                        </p>
                    </div>

                    <div class="card-footer">
                        <select class="form-select form-control text-center" size="5"  multiple aria-label=" .form-select-lg example">
                            <option value="設計">設計</option>
                            <option value="実装">実装</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="card border-info mb-3 h-100" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">開発の進め方</h5>
                        <p class="card-text">
                            説明
                        </p>
                    </div>

                    <div class="card-footer">
                        <select class="form-select form-control text-center" size="5"  multiple aria-label=" .form-select-lg example">
                            <option value="ウォーターフォール">ウォーターフォール</option>
                            <option value="アジャイル">アジャイル</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="card border-secondary mb-3 h-100" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">エンジニアの種類</h5>
                        <p class="card-text">
                            説明
                        </p>
                    </div>

                    <div class="card-footer">
                        <select class="form-select form-control text-center" size="5"  multiple aria-label=" .form-select-lg example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            </select>
                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="card border-dark mb-3 h-100" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">役職</h5>
                        <p class="card-text">
                            説明
                        </p>
                    </div>

                    <div class="card-footer">
                        <select class="form-select form-control text-center" size="5"  multiple aria-label=" .form-select-lg example">
                            <option  value="PM">
                            PM</option>
                            <option  value="PL">
                            PL</option>
                            <option  value="SM">
                            SM</option>
                            <option  value="TL">
                            TL</option>
                            <option  value="EM">
                            EM</option>
                            <option  value="SE">
                            SE</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="card mb-3 h-100" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">データベース</h5>
                        <p class="card-text">
                            説明
                        </p>
                    </div>

                    <div class="card-footer">
                        <select class="form-select form-control text-center" size="5"  multiple aria-label=" .form-select-lg example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="card border-light mb-3 h-100" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">インフラ技術</h5>
                        <p class="card-text">
                            説明
                        </p>
                    </div>

                    <div class="card-footer">
                        <select class="form-select form-control text-center" size="5"  multiple aria-label=" .form-select-lg example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>



        </div>




       <button type="submit" class="btn btn-secondary btn-lg btn-block">検索</button>
        </form>


        </div>
    </div>

</x-app-layout>
