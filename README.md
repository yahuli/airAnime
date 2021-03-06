### airAnime

因为感觉经常在各视频网站找番有点浪费时间，于是就突然萌生了一个想法：如果能同时进行，就不会浪费太多时间了。所以，airAnime 就出于这个想法诞生了。

airAnime 是一款聚合「番剧&动漫类搜索」程序，借助于各网站的数据及各网站的搜索功能进行综合搜索，以减少寻找在线番剧的时间。

v2 版本相对于 v1 版本简化了很多操作逻辑，改善了界面。

## 代码结构

```
.
├── .assert
├── .data
├── .function
    ├── .chttochs - 繁体与简体转换代码
    ├── .class - 各主要功能代码类
    ├── .small - 各辅助功能代码类
    ├── bgminfo.php - 番剧信息获取代码
    ├── bts.php - 下载源搜索控制代码
    ├── conline.php - 漫画源搜索控制代码
    ├── functions.php - 功能函数集
    ├── newbgm.php - 首页新番信息代码
    ├── picsearch.php - 以图搜番控制代码
    ├── resources.php - 本地数据库搜索控制代码
    ├── sact.json - 关键词联想代码
    ├── sonline.php - 动画源搜索控制代码
    ├── userbgm.php - 用户追番表控制代码
├── .page
    ├── about.php - 关于页面
    ├── doc.php - 使用文档页面
    ├── setting.php - 设置页面
├── config.php - 配置文件
├── index.php
```

代码写的比较糟糕，请见谅...

## 部署

- PHP 7.0+

通常情况下只需将源码上传至服务器即可正常运行基础功能。

### 额外功能

##### 本地数据库搜索

若要开启此功能，请将 `./data/数据库/bgm.sql` 上传至 MySQL 数据库（与 `userbgm.sql` 相同），然后运行 `./data/数据库/bangumi.php` 将 `bangumi.json` 的数据导入。

设置 `./config.php` 中 `db_server, db_username, db_password, db_name`，最后将 `$GLOBALS['res_is']` 设置为 `on` 即可。

##### 用户追番表

此功能是同步 bangumi.tv 的追番数据至本地服务器，并展示到 airAnime 主页。

若要关闭，请移除 `./page/setting.php` 以及 `./index.php` 中相关代码。

若要开启，请将 `./data/数据库/userbgm.sql` 上传至 MySQL 数据库（与 `bgm.sql` 相同）即可。

##### 以图搜番

申请后修改 `./config.php` 中 `picS_token` 即可。

### 数据

airAnime 中 `Anime1, Calibur, AGE动漫, 新番` 数据基于本地 json 文件，所以需要定期更新。

##### Anime1

运行 `./data/anime1.php` 后将数据粘贴至 `anime1.json` 即可。

##### Calibur

修改抓取范围并运行 `./data/calibur.php` 后将数据添加至 `calibur.json` 即可。

##### AGE动漫

修改抓取范围并运行 `./data/agefans.php` 后将数据添加至 `agefans.json` 即可。

##### 新番

新番数据基于 bangumi.tv 新番数据。

您也可以访问 `https://api.tls.moe/?app=bangumi&key=calendar` 来获取数据，然后将数据粘贴至 `201901.json` 即可。

## Todo

- 小说源搜索（是的，轻小说搜索还没完成...）
- 更多动画源
- 更多下载源

## 声明

本程序源代码可任意修改并任意使用，但禁止商业化用途。一旦使用，任何不可知事件都与原作者无关，原作者不承担任何后果。

如果您喜欢，希望可以在页面某处保留原作者(Trii Hsia)版权信息，或是保留 airAnime 的 GitHub 仓库地址（https://github.com/txperl/airAnime）。

感谢。