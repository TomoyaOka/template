//----------------------------------------------------------------------
//  モジュール読み込み
//----------------------------------------------------------------------
const gulp = require("gulp");
const { src, dest, watch, series } = require("gulp"); // 各メソッドでgulpを使えるように
const sass = require("gulp-sass")(require("sass")); // sass、Dart Sassを指定
const plumber = require("gulp-plumber");
const notify = require("gulp-notify");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssdeclsort = require("css-declaration-sorter");
const rename = require("gulp-rename");
const uglify = require("gulp-uglify");
//----------------------------------------------------------------------
//  関数定義
//----------------------------------------------------------------------
const compileSass = (done) => {
  src("./scss/**/*.scss", { sourcemaps: true }) // 入力先を指定
    .pipe(
      plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })
    )
    .pipe(sass({ outputStyle: "compressed" })) // コンパイル形式
    .pipe(
      postcss([
        autoprefixer({
          grid: "autoplace",
          cascade: false,
        }),
      ])
    )
    .pipe(postcss([cssdeclsort({ order: "alphabetical" })]))
    .pipe(dest("./css", { sourcemaps: "./sourcemaps" })); // 出力先
  done();
};

function js(done) {
  src("./js/**/*.js")
    .pipe(plumber())
    .pipe(uglify())
    .pipe(rename({ extname: ".min.js" }))
    .pipe(dest("./js"));
  done();
}
//----------------------------------------------------------------------
//  タスク定義
//----------------------------------------------------------------------
exports.default = series(compileSass); // まとめて実行
exports.js = series(js);
exports.watch = function () {
  // sassの更新を監視
  watch("./scss/**/*.scss", compileSass);
};
