<x-app-layout>
    <x-slot name="title">
        社員詳細
    </x-slot>

    <div class="content">
        <div class="container">
            <div class="card card-user">
                <div class="card-body row">
                    <div class="col-md-4">
                        <img class="avatar border-gray" src="data:image/jpeg;base64,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" alt="...">
                    </div>
                    <div class="col-md-8">
                        <h4 class="title">Mike Andrew</h4>
                        <p class="description">
                            michael24
                        </p>
                    </div>
                </div>
            </div>

            <h4 class="title">実務スキル</h4>
            <div class="row card-row" style="margin: 0px;">
                <div class="col-md card">
                    <div class="card-header">
                        <h5 class="card-title">プログラミング言語</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-full-width">
                            <table class="table skill-list">
                                <tbody>
                                    <tr>
                                        <td>&#9675;</td>
                                        <td>PHP</td>
                                    </tr>
                                    <tr>
                                        <td>&#9675;</td>
                                        <td>JavaScript</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md card">
                    <div class="card-header">
                        <h5 class="card-title">フレームワーク</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-full-width">
                            <table class="table skill-list">
                                <tbody>
                                    <tr>
                                        <td>&#9675;</td>
                                        <td>PHP</td>
                                    </tr>
                                    <tr>
                                        <td>&#9675;</td>
                                        <td>JavaScript</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md card">
                    <div class="card-header">
                        <h5 class="card-title">デザインパターン</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-full-width">
                            <table class="table skill-list">
                                <tbody>
                                    <tr>
                                        <td>&#9675;</td>
                                        <td>PHP</td>
                                    </tr>
                                    <tr>
                                        <td>&#9675;</td>
                                        <td>JavaScript</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="title">学習スキル</h4>
            <div class="card">
                <div class="raw"></div>
            </div>

            <h4 class="title">キャリア</h4>
            <div class="card">
                <div class="raw"></div>
            </div>
        </div>
    </div>

    <style>
        .container {
            width: 100%;
            padding-left: 30px;
            padding-right: 30px;
            margin-left: auto;
            margin-right: auto;
        }

        .card-row div:nth-child(1n) {
            margin-right: 10px;
        }
        .card-row div:nth-child(2n) {
            margin-left: 5px;
            margin-right: 5px;
        }
        .card-row div:nth-child(3n) {
            margin-left: 10px;
        }

        .skill-list,.skill-list td{
            border: none !important;
        }
    </style>
</x-app-layout>
