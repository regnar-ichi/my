# My

Internal FoxFamily sandbox project for small tools and experiments.

## Local

- URL: http://my.local/
- Path: `C:\regnar\OSPanel\home\my.local`
- Copy `config/db.php.example` to `config/db.php` for local DB settings.

## Health

- http://my.local/health

## Production

- URL: https://my.foxfamily.fun/
- Deploy: GitHub Actions `.github/workflows/deploy.yml`
- Runtime DB config: `.github/workflows/setup-production-config.yml`

Set repository secrets before deploy:

- `MY_FTP_SERVER`
- `MY_FTP_USERNAME`
- `MY_FTP_PASSWORD`
- `MY_DB_PASSWORD`

See [docs/ONBOARDING-MY.md](docs/ONBOARDING-MY.md) for the full controlled onboarding flow.
