
# 📁 FileIconPreview Plugin for Omeka Classic

**FileIconPreview** enhances the visual display of non-image files (e.g. ZIP, PDF, DOCX) in Omeka Classic by showing custom icons based on file extension.

NB : I shared the first working version to my use case, this is definitely not a complete work. 
## ✨ Features

- Automatically displays a 200×200 square icon box for non-image files.
- Uses file-specific icons from a `/resources/icons/` folder (e.g. `zip.png`, `pdf.png`).
- Falls back to a default icon (`default.png`) if no specific match is found.
- Clean, centered layout with consistent styling alongside image previews.
- Includes debug logging to `debug.log` for easy troubleshooting.

## 📂 Installation

1. Place the plugin folder `FileIconPreview` in your `/plugins` directory.
2. Add your icons in `FileIconPreview/resources/icons/` (e.g. `pdf.png`, `docx.png`, `default.png`).
3. Activate the plugin from the Omeka admin panel.

## 🎨 Icon Specs

- Recommended size: **100×100 px** (they’ll be centered in a 200×200 box)
- Format: **PNG**

## 🛠️ Notes

- Image files (JPG, PNG, etc.) are not affected and will continue to display normally.
- For best results, align icon naming with file extensions (e.g. `pptx.png` for `.pptx` files).
