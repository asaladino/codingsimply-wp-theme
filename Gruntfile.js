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
        clean: {
            build: ['build/codingsimply']
        },
        copy: {
            libs: {
                files: [
                    {
                        expand: true,
                        flatten: true,
                        src: [
                            'node_modules/foundation-sites/dist/js/foundation.js',
                            'node_modules/foundation-sites/dist/js/foundation.min.js',
                            'node_modules/jquery/dist/jquery.js',
                            'node_modules/jquery/dist/jquery.min.js',
                            'node_modules/jquery/dist/jquery.min.map'
                        ],
                        dest: './js/libs/'
                    },
                    {
                        expand: true,
                        flatten: true,
                        src: [
                            'node_modules/font-awesome/fonts/*'
                        ],
                        dest: './fonts/'
                    }
                ]
            },
            build: {
                files: [
                    {
                        src: [
                            'fonts/**',
                            'css/**',
                            'inc/**',
                            'js/**',
                            '*.php',
                            'README.md',
                            'LICENSE',
                            'screenshot.png',
                            'style.css',
                            'style.css.map'
                        ],
                        dest: 'build/codingsimply/'
                    }
                ]
            }
        },
        watch: {
            sass: {
                files: ['scss/**.scss'],
                tasks: ['sass:dist'],
                options: {
                    spawn: false,
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('build', ['clean:build', 'copy:build']);
    grunt.registerTask('assets', ['sass:dist', 'copy:libs']);

    grunt.registerTask('default', ['assets', 'build']);
};