module.exports = {
  env: {
    browser: true, // browser global variables
    amd: true, // define require() as global (used into gulpfile for example)
    es2022: true // set EMACScript version
  },
  extends: [
    'standard' // We use the JavaScript Standard Style convention
  ],
  rules: {
    // Remove errors for production env
    'no-console': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
    'no-debugger': process.env.NODE_ENV === 'production' ? 'warn' : 'off'
  }
}
