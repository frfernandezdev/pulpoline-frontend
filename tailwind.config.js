const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    "./src/**/*.php",
		"./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
			fontFamily: {
        sans: ['InterVariable', ...defaultTheme.fontFamily.sans],
      },
		},
  },
  plugins: [
		require('@tailwindcss/forms'),
		require('flowbite/plugin')
	],
}
