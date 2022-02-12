+++++++++++++++++++
* scss -Dart Sass
+++++++++++++++++++

- cssフォルダにてコンパイル後のcssファイルを配置し読み込み。

- gulpでコンパイル
npx gulp watch - 監視を開始。

- FLOCSSに準じたフォルダ構成。

.global
変数やmixinを管理する
・- mixin
mixinの管理

.- setting
変数の管理

.foundation
基本の設定 base reset等 

.layout(l-)
レイアウト部分の管理

.component(c-)
最小単位のパーツ

.javascript(js-)
javaScriptによって操作するもの

.project(p-)
各ページのモジュール管理

.utility(u-)
調整用

- リキッドレイアウト
remで記述する。

- ソリッドレイアウト
px or rem で記述する

- ルートスタイル
font-size:62.5%;

+++++++++++++++++++++
* HTML(マークアップ)
+++++++++++++++++++++

- BEM(Block Element Modifier)を意識して行う。
例)
l-header__inner  インナー要素
l-nav__body      メニューの本体
l-nav__list      メニューのリスト


- クラス名にプレフィックスをつける。
例)
l-header(layout)
l-nav(layout)
c-card(component)
など


- クラス名が長くなりすぎないように気をつける。
例)
NG : l-header__inner-body-list


- 状態が顕著に現れる部分については、Modifierを必ず使用する。
例)
<li class="l-nav__list"></li>
<li class="l-nav__list nav__list--icon"></li>

- セクション間は、改行２行 or コメントアウトを入れる。
例)
<section id="about"></section>
<!-- /about -->
<section id="service"></section>
<!-- /service -->

-  インデントを揃える。





