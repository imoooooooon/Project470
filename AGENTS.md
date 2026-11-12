# Krishi Bondhu
Laravel MVC, Blade, Bootstrap, JavaScript. Production database target: MariaDB.
Read docs/requirements/srs-draft-2026-11-12.txt and docs/decisions.md before changing requirements. SRS is a draft; preserve source documents.
Use controllers, form validation, Eloquent relationships and server-side policies. Never trust client role or owner IDs. Public registration must not grant privileged roles.
Run `php artisan test` and `php vendor/bin/pint --test`. Never commit .env, credentials, vendor, node_modules, or local databases.
Sprint features are complete only when all SRS behavior and relevant tests pass. Update docs/milestones.md and docs/ai-usage.md honestly. Do not claim human review or student understanding.
