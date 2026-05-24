# My Project Onboarding (working flow)

## Project profile

- code: `my`
- name: `My`
- type: internal sandbox tool
- local: `http://my.local/` → `C:\regnar\OSPanel\home\my.local`
- production: `https://my.foxfamily.fun/`
- repository: `https://github.com/regnar-ichi/my.git` branch `main`

## Backup before reset

Backup location (foxSay state before My skeleton):

- files: `C:\regnar\OSPanel\home\backups\my_local_before_reset_20260525_011248\files`
- sql: `C:\regnar\OSPanel\home\backups\my_local_before_reset_20260525_011248\my_local_before_reset.sql`
- pointer: `C:\regnar\OSPanel\home\backups\my_local_latest_backup.txt`

## Priority order used

1. backup
2. verify backup
3. cleanup
4. local skeleton
5. git connection
6. local health route
7. local smoke test
8. basic production deploy
9. production smoke test
10. document working process

## Local smoke results

- `/` → 200
- `/health` → 200, database ok
- `/assets/css/app.css` → 200

## Production deploy

GitHub Actions workflow: `.github/workflows/deploy.yml`

Required GitHub secrets (repository `regnar-ichi/my`):

- `MY_FTP_SERVER` = `xy618515.ftp.tools`
- `MY_FTP_USERNAME` = `xy618515_my`
- `MY_FTP_PASSWORD` = owner provided
- `MY_DB_PASSWORD` = owner provided (for setup workflow only)

Runtime config workflow: `.github/workflows/setup-production-config.yml`

Never commit:

- `.env`
- `config/db.php`

FTP deploy uses `server-dir: ./` when FTP user is chrooted to project root.

### Production status after first push

- GitHub repo and workflows are ready.
- Local FTP upload of `config/db.php` from this machine failed with `530 Login incorrect` — verify FTP credentials in hosting panel and set GitHub secrets, then run:
  1. `Deploy My to FTP` (on push to `main`)
  2. `Setup My production runtime config` (manual workflow_dispatch)
- After secrets + deploy: smoke test `/`, `/health`, `/assets/css/app.css` on `https://my.foxfamily.fun/`.

## ClickUp (deferred details)

Target structure for all projects:

```text
discussion
- ideas

development
- code
- design
- filling
- bugs

bugs
- list
```

No `files` section.

Missing for automated creation from bridge right now:

- dedicated ClickUp list id for project `my`
- API flow to create standard folders/lists (not in current minimal bridge MVP)

Record list id manually after owner creates structure, then link in bridge later.

## Bridge registration (minimal / later)

Avoid bridge migrations during first onboarding pass.

When ready, add project `my` in bridge DB with internal technical description only.

## Lessons learned

- Always backup files + SQL before cleanup.
- Do not use FTP bootstrap sync against empty folder (removes root files on host).
- Keep deploy excludes for runtime secrets.
- Process first, automation later.
