// Screenshot helper for the local preview.
// Usage: node dev/shot.js <url-path> [outfile] [--viewport]
// Downloads chrome-headless-shell to /tmp on first run if missing.
const { execSync } = require('child_process');
const fs = require('fs');
const path = require('path');

const CHS_DIR = '/tmp/chs/chrome-headless-shell-linux64';
const CHS = path.join(CHS_DIR, 'chrome-headless-shell');
const PW = '/tmp/node_modules/playwright';
const PORT = process.env.PORT || '8080';

function ensureBrowser() {
  if (fs.existsSync(CHS)) return;
  console.error('Downloading chrome-headless-shell…');
  execSync('curl -sSL -o /tmp/chs.zip "https://storage.googleapis.com/chrome-for-testing-public/131.0.6778.108/linux64/chrome-headless-shell-linux64.zip" && unzip -q -o /tmp/chs.zip -d /tmp/chs && chmod +x ' + CHS, { stdio: 'inherit' });
}
function ensurePlaywright() {
  if (fs.existsSync(PW)) return;
  console.error('Installing playwright…');
  execSync('cd /tmp && npm i playwright >/dev/null 2>&1', { stdio: 'inherit' });
}

(async () => {
  ensureBrowser(); ensurePlaywright();
  const { chromium } = require(PW);
  const arg = process.argv[2] || '/';
  const out = process.argv[3] || ('/tmp/shot' + arg.replace(/[^a-z0-9]+/gi, '-').replace(/^-|-$/g, '') + '.png');
  const fullPage = !process.argv.includes('--viewport');
  const url = arg.startsWith('http') ? arg : `http://127.0.0.1:${PORT}${arg}`;
  const browser = await chromium.launch({ executablePath: CHS, args: ['--no-sandbox','--disable-gpu','--disable-dev-shm-usage'] });
  const p = await browser.newPage({ viewport: { width: 1440, height: 900 }, deviceScaleFactor: 1 });
  await p.goto(url, { waitUntil: 'networkidle', timeout: 60000 });
  await p.waitForTimeout(1000);
  await p.screenshot({ path: out, fullPage });
  await browser.close();
  console.log(out);
})().catch(e => { console.error(e); process.exit(1); });
