const fs = require('fs');
const path = require('path');

const dir = './';
const files = fs.readdirSync(dir).filter(f => f.endsWith('.html'));

files.forEach(file => {
    const filePath = path.join(dir, file);
    let content = fs.readFileSync(filePath, 'utf8');
    // Replace the specific mojibake with the intended character
    content = content.replace(/â–¼/g, '▼');
    fs.writeFileSync(filePath, content, 'utf8');
    console.log(`Fixed ${file}`);
});
