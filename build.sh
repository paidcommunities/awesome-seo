PLUGIN_NAME="awesome-seo"
PROJECT_PATH=$(pwd)
BUILD_PATH="${PROJECT_PATH}/plugin"
DEST_PATH="${BUILD_PATH}/${PLUGIN_NAME}"

echo "Creating build directory..."

rm -rf "$BUILD_PATH"
mkdir -p "$DEST_PATH"

echo "Installing PHP and JS dependencies"

npm install || exit "$?"
composer install || exit "$?"

echo "executing node build scripts..."

npm run build:prod || exit "$?"

echo "syncing files to build folder..."
rsync -rc --exclude-from="${PROJECT_PATH}/.distignore" "$PROJECT_PATH/" "$DEST_PATH/" --delete --delete-excluded

#cp composer.json ${DEST_PATH}

echo "installing php dependencies..."
COMPOSER=${PROJECT_PATH}/composer.json composer install --no-dev --optimize-autoloader -d ${DEST_PATH} || exit "$?"

#rm ${DEST_PATH}/composer.json

cd "$BUILD_PATH" || exit "$?"

echo "Generate zip from build path"

zip -q -r "${PLUGIN_NAME}.zip" "$PLUGIN_NAME/"

echo "build finished"

read -p "hit enter to close terminal"
