#Plugins
require 'compass/import-once/activate'

# Set this to the root of your project when deployed:
http_path = "public"
css_dir = "public/wp-content/themes/compasshb-theme"
sass_dir = "public/wp-content/themes/compasshb-theme/sass"
images_dir = "public/wp-content/themes/compashb-theme/images"
javascripts_dir = "public/wp-content/themes/compasshb-theme/scripts"
fonts_dir = "public/wp-content/themes/compasshb-theme/fonts"

# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed

output_style = :compressed

# To enable relative paths to assets via compass helper functions.
# note: this is important in wordpress themes for sprites
relative_assets = true