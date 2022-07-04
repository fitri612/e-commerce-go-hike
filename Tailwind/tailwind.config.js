module.exports = {
  // content
  content: ["./public/**/*.{html,js}"],
  //tema
  theme: {
    container: {
      center: true,
      padding: '16px',
    },
    extend: {
      fontFamily: {
        inter: "'Inter', sans-serif;",
        popins: "'Poppins', sans-serif;"
      },
      screens: {
        '2xl': '1420px',
      },
    },
  },
  // plugins
  plugins: [
    require('tailwind-scrollbar')
  ],
  variants: {
    scrollbar: ['rounded']
  }
}
