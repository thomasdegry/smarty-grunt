var jspaths = ['src/js-dev/Settings.js', 'src/js-dev/classes/**.js','src/js-dev/helpers.js','src/js-dev/main.js'];
var csspaths = ["src/sass/*.scss", "src/sass/modules/*.scss"];

var concatpaths = ['src/js/templates.js'].concat(jspaths);

module.exports = function(grunt) {

  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    concat: {
      options: {
        banner: "(function(){\n\n",
        footer: "\n\n})();",
        separator: '\n\n'
      },
      dist: {
        src: concatpaths,
        dest: 'src/js/main.js'
      }
    },

    watch: {
      scripts:{
        files: jspaths,
        tasks: ['jshint','concat']
      },
      css:{
        files: csspaths,
        tasks:['compass:development']
      }
    },

    uglify: {
      default: {
        options: {
          wrap: true
        },
        files: {
          'out/js/main.js': concatpaths
        }
      }
    },

    compass: {
      development: { 
        options: {
          sassDir: 'src/sass',
          cssDir: 'src/css',
          environment: 'development'
        }
      },
      production: { 
        options: {
          sassDir: 'src/sass',
          cssDir: 'out/css',
          environment: 'production',
          outputStyle: 'compressed',
          force: true
        }
      }
    },

    copy: {
      production: {
        files: [
          {
            expand: true,
            cwd: 'src/',
            src: ['index.php','Classes/*', 'Controllers/*', 'dao/*', 'img/*', 'includes/*', 'smarty_templates/**', 'error/html', 'smarty_compile', 'js/vendor/*'],
            dest: 'out/'
          }
        ]
      }
    },

    jshint:{
      default:{
        options: {
          curly: true,
          eqeqeq: true,
          immed: true,
          latedef: true,
          noarg: true,
          sub: true,
          undef: true,
          eqnull: true,
          browser: true,
          noempty: true,
          trailing: true,
          globals:{
              $: true,
              console:true,
              alert:true,
              tpl:true,
              _:true,
              bean:true
          },
        },
        files:{
          src: jspaths
        }
      }
    },


  });

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-jshint');

  grunt.registerTask('default', ['jshint','concat','compass:development','watch']);
  grunt.registerTask('production', ['jshint','uglify','compass:production','copy:production']);

};