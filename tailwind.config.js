module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        content: {
            'link': 'url("/icons/link.svg")',
        },
    },
  },
  plugins: [],
}
