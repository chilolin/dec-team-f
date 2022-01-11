## 開発環境
| 名前 | バージョン |
| --- | --- |
| PHP | 8.1 |
| Laravel | 8 |
| Node.js | 16 |
| npm | 8.3.0 |
| MariaDB | |
| Docker | |

## 環境構築
0. [Docker Desktop](https://docs.docker.com/desktop/windows/wsl/) をインストールして、起動しておく。
1. リポジトリをクローンする。(wsl を使用している場合は`/home/<ユーザー名>`上で行う)
```
git clone https://github.com/chilolin/dct-team-f.git
cd dct-team-f
```
2. SailコマンドをBashエイリアスとして設定する。
```
vi ~/.bashrc

# ./bashrc に下記を記入する。
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```
3. 環境変数を`.env.example`をもとに`.env`ファイルを記入する。
4. Sailをバックグラウンドで立ち上げる。(初回は時間がかかります。)
```
sail up -d

# Laravel本体のみ
sail up -d "laravel.test"

# MariaDB本体のみ
sail up -d "mariadb"
```


