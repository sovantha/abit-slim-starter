module.exports = function(grunt) {
	grunt.initConfig({
		concat: {	
			options: {
				stripBanners: { 
					force: true, 
					block: true, 
					line: true 
				}
			},		
			js: {				
				src: [
					'_root/js/jquery-3.5.1.min.js',
					'_root/js/jquery.overlay-scrollbars.min.js',
					'_root/js/popper.min.js',
					'_root/js/bootstrap.min.js',
					'_root/js/adminlte.min.js',
					'_root/js/select2.min.js',
					'_root/js/select2-bootstrap4.min.js',
					'_root/js/list.min.js',
					'_root/js/notific.js',
					'_root/js/chart.min.js'
				],
				dest: '../root/js/scripts.js'
			},
			css: {				
				src: [
					'_root/css/nokora.css',
					'_root/css/all.min.css',
					'_root/css/adminlte.min.css',
					'_root/css/overlay-scrollbars.min.css',
					'_root/css/notific.min.css',
					'resources/assets/styles/custom.css'
				],
				dest: '../root/css/styles.css'
			}
		},

		copy: {
			main: {
				files: [
					{ expand: true, cwd: '_root/', src: ['fonts/*'], dest: '../root/', filter: 'isFile' },
					{ expand: true, cwd: '_root/', src: ['webfonts/*'], dest: '../root/', filter: 'isFile' },					
					{ expand: true, cwd: '_root/', src: ['img/**'], dest: '../root/' },
					{ expand: true, cwd: '_root/', src: ['*'], dest: '../root/', filter: 'isFile' },
					{ expand: true, cwd: '_root/', src: ['.htaccess'], dest: '../root/' },
					{ expand: true, cwd: '_root/js/', src: ['popper.min.js.map'], dest: '../root/js/', filter: 'isFile' },
					{ expand: true, cwd: '_root/js/', src: ['adminlte.min.js.map'], dest: '../root/js/', filter: 'isFile' },
					{ expand: true, cwd: '_root/js/', src: ['list.min.js.map'], dest: '../root/js/', filter: 'isFile' },
					{ expand: true, cwd: '_root/js/', src: ['alpine.min.js'], dest: '../root/js/', filter: 'isFile' },
					{ expand: true, cwd: '_root/js/', src: ['alpine-persist.min.js'], dest: '../root/js/', filter: 'isFile' },
					{ expand: true, cwd: '_root/js/', src: ['require.min.js'], dest: '../root/js/', filter: 'isFile' },
					{ expand: true, cwd: '_root/css/', src: ['adminlte.min.css.map'], dest: '../root/css/', filter: 'isFile'  }
				]
			},
			js: {
				files: [
					{ expand: true, cwd: 'resources/assets/scripts/', src: ['*'], dest: '../root/js/', filter: 'isFile' },
					{ expand: true, cwd: 'resources/assets/scripts/', src: ['components/*'], dest: '../root/js/', filter: 'isFile' },
					{ expand: true, cwd: 'resources/assets/scripts/', src: ['store/*'], dest: '../root/js/', filter: 'isFile' },
					{ expand: true, cwd: 'resources/assets/scripts/', src: ['services/*'], dest: '../root/js/', filter: 'isFile' },
				]
			}
		},

		cssmin: {
		 	target: {
			    files: [{
			    	expand: true,
			    	cwd: '../root/css',
					src: 'styles.css',
					dest: '../root/css',
			    }]
			}
		},

		uglify: {
			build: {
				files: {
					
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-concat');
	//grunt.loadNpmTasks('grunt-contrib-uglify');
	//grunt.loadNpmTasks('grunt-contrib-uglify-es');
	//grunt.loadNpmTasks('grunt-contrib-cssmin');

	grunt.registerTask('concat-js', ['concat:js']);
	grunt.registerTask('concat-css', ['concat:css']);

	grunt.registerTask('build', ['copy', 'copy:js', 'concat-js', 'concat-css']);
	grunt.registerTask('default', ['copy:js'])
};