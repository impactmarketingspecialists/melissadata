module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    phplint: {
      options: {
      },
      all: [ './*.php', './test/*.php' ],
    },
    phpunit: {
      classes: {
          dir: './test'
      },
      options: {
          bin: 'vendor/bin/phpunit',
          bootstrap: 'test/autoload.php',
          colors: true,
          verbose: true,
          processIsolation: true,
          debug: true,
          followOutput: true
      }
    }
  });

  grunt.loadNpmTasks('grunt-phplint');
  grunt.loadNpmTasks('grunt-phpunit');

  // Default task(s).

  grunt.registerTask('default',  ['test']);
  grunt.registerTask('test', ['phplint','phpunit']);
};