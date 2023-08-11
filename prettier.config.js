module.exports = {
    braceStyle: 'psr-2',
    insertPragma: false,
    overrides: [
        {
            files: ['*.blade.php'],
            options: {
                tabWidth: 4,
                parser: 'blade'
            }
        }
    ],
    phpVersion: '8.1',
    printWidth: 300,
    requirePragma: false,
    singleQuote: true,
    sortHtmlAttributes: 'code-guide',
    tabWidth: 4,
    trailingComma: 'es5',
    trailingCommaPHP: true,
    wrapAttributes: 'force-expand-multiline'
};
