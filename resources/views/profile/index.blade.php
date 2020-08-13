@extends('layouts.base')
@section('side-title','Twitter')
@section('side-contents')
<a class="twitter-timeline" href="https://twitter.com/makao26?ref_src=twsrc%5Etfw">
  Tweets by makao26
</a>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endsection
@section('title','自己紹介')
@section('content')
<style>
div #section a  {
    cursor:pointer;
}
.section{
  height:320px;
  border:1px solid #ff6a00;
}
</style>

<div class="base-profile">
  <div id="section" class="section">
    目次<br/>
    <a id="link_who_am_i" href="javascript:void(0);" onclick="ScrollWindow('who_am_i');">Who am I</a><br/>
    <a id="link_coment" href="javascript:void(0);" onclick="ScrollWindow('coment');">コメント</a><br/>
    <a id="link_career" href="javascript:void(0);" onclick="ScrollWindow('gz');">職務経歴 gz</a><br/>
  </div>
  <h1 id="who_am_i">Who am I !?</h1>
  <p>
    名前: makao26<br>
    Twitter:@makao26
  </p>
  <h2 id="coment">コメント</h2>
  <p>関西に出没するITエンジニアです。楽しく開発がモットーです。</p>
  <h2>基本データ</h2>
  <p>
    誕生日: 1994.12.05<br>
    性別: 男<br>
    学歴: 京都産業大学 コンピュータ理工学部 インテリジェントシステム学科 卒業<br>
    資格: 基本情報技術者<br>
    趣味: フットサル（サッカー）、WEBアプリオケーション作成<br>
    特技: 幅広いIT技術を薄らキャッチアップすること<br>
  </p>
  <hr>
  <h2 id="career" >職務経歴</h2>
  <div id="Company01">
    <h3>社会インフラ系SIer</h3>
    <p>
      1: トレインビジョンシステム (車上)<br>
      担当フェーズ: ソフトウェア設計、テスト設計、プログラミング、単体テスト、組み合わせテスト<br>
      開発環境: Linux<br>
      開発言語・フレームワーク・DB: C言語<br>
      メンバー: 4人<br>
      役割: SE、PG、TS<br>
      ポイント:<br>
      入社して間もない頃から大学時代プログラミングを行ってきたことを評価され、
      ソフトウェア設計、プログラミングを中心に任された。<br>
      既存のシステムの改修なのでまずどこをどのように変更すれば良いのかコードを解析することで貢献できた。<br>
    </p>
    <p>
      2: トレインビジョンシステム (地上)<br>
      担当フェーズ: プログラミング、単体テスト<br>
      開発環境: Windows 10、Eclipse<br>
      開発言語・フレームワーク・DB: Java、Oracle Database<br>
      メンバー: 3人<br>
      役割: PG、TS<br>
      ポイント:<br>
      Javaを用いて、テストコードの作成、ソースコードの作成を行った。<br>
      ラムダ式などモダンなソフトウェアでは当たり前に使われている知識を業務で実際に使用することができた。<br>
      また、SQLを本格的に扱うことで関係データベースの基礎的なことを体得できた。<br>
    </p>
    <p>
      3: 電力管理システム <br>
      担当フェーズ: プログラミング、単体テスト<br>
      開発環境: Linux<br>
      開発言語・フレームワーク・DB: C言語<br>
      メンバー: 3人<br>
      役割: PG、TS<br>
      ポイント:<br>
      プログラミングを中心に任された。既存のシステムの改修なのでまずソースコード解析を行い、
      現状の設計では実装が難しい部分は設計変更を提案し実装面から設計者をサポートした。<br>
      また、簡単なリファクタリングを行いソースコードのメンテナンス性も向上に貢献できた。<br>
    </p>
    <p>
      4: 電力管理システム (シミュレータ) <br>
      担当フェーズ: プログラミング、単体テスト<br>
      開発環境: Windows XP(VM Ware)<br>
      開発言語・フレームワーク・DB: Delphi、postgresql、VBA<br>
      メンバー: 3人<br>
      役割: PG、TS<br>
      ポイント:<br>
      かなり古いソフトウェアの為、開発ノウハウが失われつつある状態だったので、開発手順書の作成、
      テスト手順もあいまいな状態であったので、テスト手順書の作成を行い、その手順書をもとに他の人に
      試験をしてもらうことで開発ノウハウの展開することができた。<br>
      ソフトウェアの解析をメンバーと行いブラックボックスであった部分がクリアになったことで追加開発をする
      際の工数削減に貢献できた。<br>
      メンバーのタスク管理工程管理を任されており、タスクの分解、振り分け、作業時間の計測などを行った。<br>
    </p>
  </div>
  <hr>
  <div id="Company02">
    <h3 id="gz">スマホ、PC向けゲーム会社</h3>
    <p>
      1: 教育機関向け、オンライン学習システム開発<br>
      担当フェーズ: プログラミング、単体テスト<br>
      開発環境: なし<br>
      開発言語・フレームワーク・DB: JavaScript<br>
      メンバー: 5人<br>
      役割: SE<br>
      ポイント:<br>
      今回の主な役割は仕様検討と画面設計である。仕様検討に関しては連携しているWebAPIの仕様を
      理解するためWEBAPIをたたくツールを使用して仕様がどうすれば実現可能のなのかをお客様に提示
      することができた。<br>
      また、没になった機能ではあるが、小さいJavaScriptのデモソースコードを製作した。
      これを機に業務外の学習でJavaScriptの基本的な技術要素を獲得することができた。<br>
    </p>
    <p>
      2: スマホ、PC向けソーシャルカードゲーム<br>
      担当フェーズ: 運用、改修<br>
      開発環境: Windowsサーバ(AWS)<br>
      開発言語・フレームワーク・DB: C#、.NET、SQLServer <br>
      メンバー: 6人<br>
      役割: SE、PG<br>
      ポイント:<br>
      毎週行われるゲーム内イベント前のメンテナンスをすることでAWSのRDS、EC2、ロードバランサー等の
      実務経験を手に入れることができた。<br>
      バグの解析を行い、チームのエンジニアに展開し改修方法を提案することができた。<br>
    </p>
    <p>
      3: スマホ、PC向けソーシャルカードゲーム<br>
      担当フェーズ: 詳細設計、開発<br>
      開発環境: Linuxサーバー(AWS)<br>
      開発言語・フレームワーク・DB: PHP、Laravel、、MySQL <br>
      メンバー: 人<br>
      役割: サーバーサイドのSE、PG<br>
      ポイント:<br>
      新規開発の案件に途中から参加した。主にインゲーム部分と報酬配布のバッチ処理を担当した。<br>
      業務内容としては、WebAPI設計、DB設計、API実装など。ゲームのサーバーサイドではRedisを多用する。
      Redisを用いたロック処理などを通してRedisの知見が深まった。<br>
      案件に参画する前からLaravelを使うと事前に知っていたため、予め勉強しておいたので、スムーズに開発をする
      ことができた。<br>
    </p>
  </div>
</div>


@endsection
