# mod_boxesghsvs
Believe me! You don't need it. **WRITTEN AND STYLED FOR 1 INDIVIDUAL WEBSITE.**

Joomla site module. Backend: Enter title, image, text in separate form fields instead of everything in the editor. More controllable output in the frontend e.g. as cards.

# My personal build procedure (WSL 1 or 2, Debian, Win 10)

- Prepare/adapt `./package.json`.
- `cd /mnt/z/git-kram/mod_boxesghsvs/`

## node/npm updates/installation
- `npm run updateCheck` or (faster) `npm outdated`
- `npm run update` (if needed) or (faster) `npm update --save-dev`
- `npm install` (if needed)

## Build installable ZIP package
- `node build.js`
- New, installable ZIP is in `./dist` afterwards.
- All packed files for this ZIP can be seen in `./package`. **But only if you disable deletion of this folder at the end of `build.js`**.s

### For Joomla update and changelog server
- Create new release with new tag.
- - See release description in `dist/release.txt`.
- Extracts(!) of the update and changelog XML for update and changelog servers are in `./dist` as well. Copy/paste and necessary additions.
