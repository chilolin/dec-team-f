## 開発環境
#### ローカル環境
| 名前 | バージョン |
| --- | --- |
| PHP | 8.1 |
| Composer | 2.2.4 |
| Docker | |
#### Dockerコンテナ内主要環境
| 名前 | バージョン |
| --- | --- |
| PHP | 8.1 |
| Composer | 2.2.4 |
| Laravel | 8 |
| Node.js | 16.13.2 |
| npm | 8.3.0 |
| MariaDB | |

## 環境構築
0. [Docker Desktop](https://docs.docker.com/desktop/windows/wsl/) をインストールして、起動しておく。
1. リポジトリをクローンする。(wsl を使用している場合は`/home/<ユーザー名>`上で行う)
```
$ git clone https://github.com/chilolin/dct-team-f.git
$ cd dct-team-f
$ composer install
```
2. SailコマンドをBashエイリアスとして設定する。
```
$ alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
$ source ~/.bashrc

# 変更の更新
$ source ~/.bash_profile
```
3. 環境変数を`.env.example`をもとに`.env`ファイルを記入する。
4. Sailをバックグラウンドで立ち上げる。(初回は時間がかかります。)
```
$ sail up -d
$ sail composer install
$ sail npm install

# MariaDBのみ
$ sail up -d "mariadb"
```
5. Sailを止める
```
$ sail stop
```
