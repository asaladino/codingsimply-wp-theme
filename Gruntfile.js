module.exports = function (grunt) {
    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            dist: {
                options: {
                    sourceMap: true,
                    // @link https://make.wordpress.org/core/handbook/best-practices/coding-standards/css/
                    indentedSyntax: false,
                    indentType: 'tab',
                    indentWidth: '1',
                    includePaths: [
                        'node_modules/foundation-sites/scss',
                        'node_modules/motion-ui',
                        'node_modules/chartist/dist/scss',
                        'node_modules/animate-sass',
                        'node_modules/font-awesome/scss'
                    ],
                    outputStyle: 'expanded'
                },
                files: {
                    'style.css': 'scss/app.scss'
                }
            }
        },
        copy: {
            build: {
                files: [
                    {
                        src: [
                            'bin/*',
                            'config/**',
                            'logs/empty',
                            'plugins/**',
                            'src/**',
                            'tmp/empty',
                            'vendor/**',
                            'webroot/css/*.css',
                            'webroot/img/**',
                            'webroot/js/dist/*.js',
                            'webroot/.htaccess',
                            'webroot/favicon.ico',
                            'webroot/index.php'
                        ],
                        dest: 'build/naming_lab/'
                    }
                ]
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-sass');

    grunt.registerTask('buildProd', ['copy:build']);
    grunt.registerTask('sassProd', ['sass:dist']);
};