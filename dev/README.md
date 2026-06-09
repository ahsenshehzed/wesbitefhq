# Local preview

Spin up a throwaway WordPress (SQLite, no MySQL) serving this theme:

```bash
dev/preview.sh
```

Then open **http://127.0.0.1:8080/** — admin at `/wp-admin/` (`admin` / `admin12345`).

The theme is symlinked into WordPress, so edits to files in this repo are live on
refresh. The WordPress install lives outside the repo (`~/wp`) and is **not** committed.

- `dev/preview.sh`  — downloads WP core + SQLite plugin, configures, installs, serves.
- `dev/scaffold.php` — activates the theme and creates Home / Pricing / Blog pages.

Override defaults with env vars: `PORT`, `WP_DIR`, `ADMIN_USER`, `ADMIN_PASS`.

## Screenshots (for web sessions)

Capture any page (full-page by default; `--viewport` for above-the-fold):

```bash
node dev/shot.js /            # home
node dev/shot.js /pricing/    # pricing
node dev/shot.js /blog/ /tmp/blog.png --viewport
```

First run auto-downloads `chrome-headless-shell` to `/tmp` (wordpress.org &
Playwright CDN are firewalled here; Google's chrome-for-testing bucket works).
