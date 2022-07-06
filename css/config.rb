asset_cache_buster do |path, file| if file
	pathname = Pathname.new(path)
	{:path => "%s/%s.%s%s" % [pathname.dirname, pathname.basename(pathname.extname), Zlib::crc32(Digest::MD5.file(file.path).hexdigest), pathname.extname]}
end end
cache = false
preferred_syntax = :sass
http_path = '/'
css_dir = '/'
sass_dir = '/'
images_dir = '../img/'
fonts_dir = '../fonts/'
relative_assets = true
line_comments = false
output_style = :expanded
#output_style = :compact
# output_style = :compressed
sass_options = {:sourcemap => true}