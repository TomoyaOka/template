const path = require('path');

module.exports = {
  // モードの設定
  mode: 'development',

  // エントリーポイントの設定
  entry: './src/index.js',

  // ファイルの出力設定
  output: {
    // 出力するファイル名
    filename: 'bundle.js',

    //  出力先のパス
    path: path.join(__dirname, 'js')
  },
  // ローダーの設定
module: {
  rules: [
    {
      // 処理対象ファイル
      test: /\.js$/,

      // 処理対象から外すファイル
      exclude: /node_modules/,
      use: [
        {
          // 利用するローダー
          loader: 'babel-loader',
          options: {
            presets: [
              [
                '@babel/preset-env', {
                  modules: false
                }
              ]
            ]
          }
        }
      ]
    }
  ]
}
};