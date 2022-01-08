module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.css",
  ],
  theme: {
    
    colors: {
      
      'white': '#ffffff',
      'darkpink':'#CC7351',
      'lightpink':'#E08F62',
      'hunter':'#9DAB86',
      'darkhunter':'#5b6747',
      'beige':'#e7e1c5',
      'black':'#000',
      'lighthunter':'#7D8D61',
      'lightbeige' :'#efebd8'
      
    }
  },
  plugins: [require('@tailwindcss/forms')], 
}
