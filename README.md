# sysdev_midterm

## 依存ソフトウェア

---

この掲示板サービスを構築・実行するには，以下のソフトウェアが必要です。各環境にあわせて予め導入しておいてください。

- git
- Docker
- Docker Compose

## 構築手順

1. ソースコードを設置

    ```sh
    git clone git@github.com:eugenesinamban/sysdev_midterm.git
    cd sysdev_midterm
    ```

2. 立ち上げ

    aliasの設定をして、サーバーを起動します。

    ```sh
    source aliases.sh
    u
    ```

3. DBテーブルの作成

    起動中のdbコンテナーにテーブルを作成します。

    ```sh
    db-bash
    ```

    テーブルを作成するスクリプトは以下になります

    ```sh
    CREATE TABLE `message_board` (
        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `title` TEXT NOT NULL,
        `message` TEXT NOT NULL,
        `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
        `image_filename` TEXT DEFAULT NULL
    );
    ```

4. 動作確認

    掲示板のページは```/index.php```です。ブラウザから ```http://サーバーのアドレス/index.php``` にアクセスし，動作を確認してください。
