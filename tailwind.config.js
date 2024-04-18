/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**.{php,html,js}","./template-parts/*.{php,html,js}","./blocks/*/**.{php,html,js}","./woocommerce/*.{php,html,js}", "./woocommerce/*/**.{php,html,js}"],
  theme: {
    extend: {
      fontFamily: {
        'Poppins': ['Poppins', 'sans-serif'],
      },

      colors: {
        'blue': '#E4EAFF',
        'dark-blue': '#21316A',
        'gray': '#475467',
      },
      height: {
      },

      maxWidth:{
      }
    },
  },
  plugins: []
};
