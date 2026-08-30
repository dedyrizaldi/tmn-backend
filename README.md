
```
tmn-backend
├─ .editorconfig
├─ app
│  ├─ Filament
│  │  └─ Resources
│  │     ├─ Equipment
│  │     │  ├─ EquipmentResource.php
│  │     │  ├─ Pages
│  │     │  │  ├─ CreateEquipment.php
│  │     │  │  ├─ EditEquipment.php
│  │     │  │  └─ ListEquipment.php
│  │     │  ├─ Schemas
│  │     │  │  └─ EquipmentForm.php
│  │     │  └─ Tables
│  │     │     └─ EquipmentTable.php
│  │     ├─ EquipmentCategories
│  │     │  ├─ EquipmentCategoryResource.php
│  │     │  ├─ Pages
│  │     │  │  ├─ CreateEquipmentCategory.php
│  │     │  │  ├─ EditEquipmentCategory.php
│  │     │  │  └─ ListEquipmentCategories.php
│  │     │  ├─ Schemas
│  │     │  │  └─ EquipmentCategoryForm.php
│  │     │  └─ Tables
│  │     │     └─ EquipmentCategoriesTable.php
│  │     ├─ News
│  │     │  ├─ NewsResource.php
│  │     │  ├─ Pages
│  │     │  │  ├─ CreateNews.php
│  │     │  │  ├─ EditNews.php
│  │     │  │  └─ ListNews.php
│  │     │  ├─ Schemas
│  │     │  │  └─ NewsForm.php
│  │     │  └─ Tables
│  │     │     └─ NewsTable.php
│  │     ├─ NewsCategories
│  │     │  ├─ NewsCategoryResource.php
│  │     │  ├─ Pages
│  │     │  │  ├─ CreateNewsCategory.php
│  │     │  │  ├─ EditNewsCategory.php
│  │     │  │  └─ ListNewsCategories.php
│  │     │  ├─ Schemas
│  │     │  │  └─ NewsCategoryForm.php
│  │     │  └─ Tables
│  │     │     └─ NewsCategoriesTable.php
│  │     ├─ ProjectCategories
│  │     │  ├─ Pages
│  │     │  │  ├─ CreateProjectCategory.php
│  │     │  │  ├─ EditProjectCategory.php
│  │     │  │  └─ ListProjectCategories.php
│  │     │  ├─ ProjectCategoryResource.php
│  │     │  ├─ Schemas
│  │     │  │  └─ ProjectCategoryForm.php
│  │     │  └─ Tables
│  │     │     └─ ProjectCategoriesTable.php
│  │     └─ Projects
│  │        ├─ Pages
│  │        │  ├─ CreateProject.php
│  │        │  ├─ EditProject.php
│  │        │  └─ ListProjects.php
│  │        ├─ ProjectResource.php
│  │        ├─ Schemas
│  │        │  └─ ProjectForm.php
│  │        └─ Tables
│  │           └─ ProjectsTable.php
│  ├─ Http
│  │  ├─ Controllers
│  │  │  ├─ Api
│  │  │  │  └─ V1
│  │  │  │     ├─ EquipmentController.php
│  │  │  │     ├─ HomeController.php
│  │  │  │     ├─ NewsController.php
│  │  │  │     └─ ProjectController.php
│  │  │  └─ Controller.php
│  │  └─ Resources
│  │     ├─ Equipment
│  │     │  ├─ EquipmentCollection.php
│  │     │  └─ EquipmentResource.php
│  │     ├─ News
│  │     │  ├─ NewsCategoryCollection.php
│  │     │  ├─ NewsCategoryResource.php
│  │     │  ├─ NewsCollection.php
│  │     │  └─ NewsResource.php
│  │     ├─ Project
│  │     │  ├─ ProjectCollection.php
│  │     │  └─ ProjectResource.php
│  │     └─ ProjectCategory
│  │        ├─ ProjectCategoryCollection.php
│  │        └─ ProjectCategoryResource.php
│  ├─ Models
│  │  ├─ Equipment.php
│  │  ├─ EquipmentCategory.php
│  │  ├─ News.php
│  │  ├─ NewsCategory.php
│  │  ├─ Project.php
│  │  ├─ ProjectCategory.php
│  │  └─ User.php
│  ├─ Policies
│  │  └─ RolePolicy.php
│  ├─ Providers
│  │  ├─ AppServiceProvider.php
│  │  └─ Filament
│  │     └─ AdminPanelProvider.php
│  └─ Traits
│     └─ ApiResponse.php
├─ artisan
├─ bootstrap
│  ├─ app.php
│  ├─ cache
│  │  ├─ packages.php
│  │  └─ services.php
│  └─ providers.php
├─ composer.json
├─ composer.lock
├─ config
│  ├─ app.php
│  ├─ auth.php
│  ├─ cache.php
│  ├─ database.php
│  ├─ filesystems.php
│  ├─ logging.php
│  ├─ mail.php
│  ├─ queue.php
│  ├─ services.php
│  └─ session.php
├─ database
│  ├─ database.sqlite
│  ├─ factories
│  │  └─ UserFactory.php
│  ├─ migrations
│  │  ├─ 0001_01_01_000000_create_users_table.php
│  │  ├─ 0001_01_01_000001_create_cache_table.php
│  │  ├─ 0001_01_01_000002_create_jobs_table.php
│  │  ├─ 2026_07_19_071900_create_equipment_categories_table.php
│  │  ├─ 2026_07_19_071938_create_equipment_table.php
│  │  ├─ 2026_07_19_072232_create_media_table.php
│  │  ├─ 2026_07_19_085642_create_project_categories_table.php
│  │  ├─ 2026_07_19_090730_create_projects_table.php
│  │  ├─ 2026_07_21_074633_create_news_categories_table.php
│  │  └─ 2026_07_21_075300_create_news_table.php
│  └─ seeders
│     ├─ AdminUserSeeder.php
│     ├─ DatabaseSeeder.php
│     ├─ EquipmentSeeder.php
│     └─ ProjectSeeder.php
├─ package-lock.json
├─ package.json
├─ phpunit.xml
├─ public
│  ├─ .htaccess
│  ├─ build
│  │  ├─ assets
│  │  │  ├─ app-CIjPDMey.css
│  │  │  └─ app-CIomGrQN.js
│  │  └─ manifest.json
│  ├─ css
│  │  └─ filament
│  │     └─ filament
│  │        └─ app.css
│  ├─ favicon.ico
│  ├─ fonts
│  │  └─ filament
│  │     └─ filament
│  │        └─ inter
│  │           ├─ index.css
│  │           ├─ inter-cyrillic-ext-wght-normal-IYF56FF6.woff2
│  │           ├─ inter-cyrillic-wght-normal-JEOLYBOO.woff2
│  │           ├─ inter-greek-ext-wght-normal-EOVOK2B5.woff2
│  │           ├─ inter-greek-wght-normal-IRE366VL.woff2
│  │           ├─ inter-latin-ext-wght-normal-HA22NDSG.woff2
│  │           ├─ inter-latin-wght-normal-NRMW37G5.woff2
│  │           └─ inter-vietnamese-wght-normal-CE5GGD3W.woff2
│  ├─ index.php
│  ├─ js
│  │  └─ filament
│  │     ├─ actions
│  │     │  └─ actions.js
│  │     ├─ filament
│  │     │  ├─ app.js
│  │     │  └─ echo.js
│  │     ├─ forms
│  │     │  └─ components
│  │     │     ├─ checkbox-list.js
│  │     │     ├─ code-editor.js
│  │     │     ├─ color-picker.js
│  │     │     ├─ date-time-picker.js
│  │     │     ├─ file-upload.js
│  │     │     ├─ key-value.js
│  │     │     ├─ markdown-editor.js
│  │     │     ├─ rich-editor.js
│  │     │     ├─ select.js
│  │     │     ├─ slider.js
│  │     │     ├─ tags-input.js
│  │     │     └─ textarea.js
│  │     ├─ notifications
│  │     │  └─ notifications.js
│  │     ├─ schemas
│  │     │  ├─ components
│  │     │  │  ├─ actions.js
│  │     │  │  ├─ tabs.js
│  │     │  │  └─ wizard.js
│  │     │  └─ schemas.js
│  │     ├─ support
│  │     │  └─ support.js
│  │     ├─ tables
│  │     │  ├─ components
│  │     │  │  └─ columns
│  │     │  │     ├─ checkbox.js
│  │     │  │     ├─ select.js
│  │     │  │     ├─ text-input.js
│  │     │  │     └─ toggle.js
│  │     │  └─ tables.js
│  │     └─ widgets
│  │        └─ components
│  │           ├─ chart.js
│  │           └─ stats-overview
│  │              └─ stat
│  │                 └─ chart.js
│  └─ robots.txt
├─ README.md
├─ resources
│  ├─ css
│  │  └─ app.css
│  ├─ js
│  │  ├─ app.js
│  │  └─ bootstrap.js
│  └─ views
│     └─ welcome.blade.php
├─ routes
│  ├─ api.php
│  ├─ console.php
│  └─ web.php
├─ storage
│  ├─ app
│  │  ├─ private
│  │  │  ├─ 10
│  │  │  │  └─ 01KXWTDANVN19NWC1CYTVT0KZB.png
│  │  │  ├─ 11
│  │  │  │  └─ 01KY1V1NAGAW7X3Y3V3KR27C2Q.png
│  │  │  ├─ 12
│  │  │  │  └─ 01KY1V1NRQZH7AMNWBYDGJ4YYR.png
│  │  │  ├─ 13
│  │  │  │  └─ 01KY1V1NSAWK0Z29BKE4AQ2A65.png
│  │  │  ├─ 14
│  │  │  │  └─ 01KY1ZVVPMX1HYGN7NRVWYHGVV.png
│  │  │  ├─ 15
│  │  │  │  └─ 01KY1ZVW1PK7D925D9M51WENWY.png
│  │  │  ├─ 16
│  │  │  │  └─ 01KY1ZVW2F99H3XZBM0K2EZTG6.png
│  │  │  ├─ 5
│  │  │  │  └─ 01KXWS7GJQW6DJ7566N2TG1MQE.png
│  │  │  ├─ 6
│  │  │  │  └─ 01KXWS7GM9V7TBQ26A1NPBPJJ9.png
│  │  │  ├─ 7
│  │  │  │  └─ 01KXWTDAH1ABK97X4PCJXVQEHX.png
│  │  │  ├─ 8
│  │  │  │  └─ 01KXWTDAJPA2796BK840K1A7JD.png
│  │  │  ├─ 9
│  │  │  │  └─ 01KXWTDAM7D3JFMY2P1JJQXSF6.png
│  │  │  └─ livewire-tmp
│  │  │     ├─ 3rMXwdjMDmmvoOQt2PejDZJgccifAWCYEt0RP3mD.png
│  │  │     ├─ 3rMXwdjMDmmvoOQt2PejDZJgccifAWCYEt0RP3mD.png.json
│  │  │     ├─ aJETAcNIXyUGpbaMSTc4qYm1YRyKINVfbqOcdJxo.png.json
│  │  │     ├─ CVU4zPaCNcoq7Kh4kKCB19kqR5HUqvKbNDZUtDOY.png
│  │  │     ├─ CVU4zPaCNcoq7Kh4kKCB19kqR5HUqvKbNDZUtDOY.png.json
│  │  │     ├─ j4iHQDFMpw6BfnSU58KJfk2qjB5cMngQHuqUSAtt.png.json
│  │  │     ├─ jfVhkcjSEgcPFpFQOfsNJAPSAWdFglDw4rPpWh2X.png.json
│  │  │     ├─ oMTI3asCpxA18JZfQbE8Twl4N3uO0JX4xNA3AuMp.png
│  │  │     ├─ oMTI3asCpxA18JZfQbE8Twl4N3uO0JX4xNA3AuMp.png.json
│  │  │     ├─ QAoFo9qSwi0hLFlbXhxPcfOtdBaAhi4a7qOLIiSR.png.json
│  │  │     ├─ vNLYgyYGwsRaahT4k3H6YnGWaJa0heXkTBmCyN0h.png.json
│  │  │     ├─ yBI2YLFo1mHsyD1MtgdLQZn9MxEhP83SyYb40FUK.png
│  │  │     ├─ yBI2YLFo1mHsyD1MtgdLQZn9MxEhP83SyYb40FUK.png.json
│  │  │     └─ YIj4oPR2eo1Pgk2OypietbiQUUMCClL0n9uQhlJ3.png.json
│  │  └─ public
│  ├─ framework
│  │  ├─ cache
│  │  │  └─ data
│  │  ├─ sessions
│  │  ├─ testing
│  │  └─ views
│  │     ├─ 00607fe7543bbc09ecb8813054aebfac.php
│  │     ├─ 029457bc008af1652e5292c50172bd1c.php
│  │     ├─ 0706801cb770959108edbd9c820b845c.php
│  │     ├─ 073cd2970d50c26ae31ccb2caa570201.php
│  │     ├─ 0ac3c30bc06942f822f081ee5b187aea.php
│  │     ├─ 0b4a0e24eed94f6b0c85c2496e27f1ea.php
│  │     ├─ 13d52d32c1c3559435210b4df461a049.php
│  │     ├─ 15cb8925745290dca27ffd633424c33e.php
│  │     ├─ 16c238b023f1dbf8dd433331550e657f.php
│  │     ├─ 1e80539572c52bbc7efe27c2c3f6d4eb.php
│  │     ├─ 1f30f1d03fad232fa28723be6c8c723a.php
│  │     ├─ 1f4931f96d849d343ae9036f050bb5d6.php
│  │     ├─ 29498a4785b0bf6d3f53dad98bc275ca.php
│  │     ├─ 2c797aa247ad54b467bb3524588cfdbb.php
│  │     ├─ 357b3b9c7caa39126e2bd28a3f0d94bc.php
│  │     ├─ 366f829c541868c295d5b71a0a7f741c.php
│  │     ├─ 393aab034938f25972d6ca41ca686bdf.php
│  │     ├─ 3bdaf3c58da59c065cd229f925e6d3b5.php
│  │     ├─ 3eea25d0ba40039a831594eeaaa622d8.php
│  │     ├─ 3fa8ee96a4101c552c970b9f0874e504.php
│  │     ├─ 42fdec4a8cfdcf356fffa5c71420115b.php
│  │     ├─ 45e6a027c741a96d23b1ea8fe749a2be.php
│  │     ├─ 466ef4de7fb79adb804c44bab90d08a3.php
│  │     ├─ 46d9d857906e988e181398c53da1838f.php
│  │     ├─ 46da3e77ad05a4d9fdfed37539213829.php
│  │     ├─ 4719821b0203196ac484c17fcf2ff8fa.php
│  │     ├─ 47e1f52a05de9f9d7f0b71950e0fdf1a.php
│  │     ├─ 4943bc92ebba41e8b0e508149542e0ad.blade.php
│  │     ├─ 4a64a7c001fe4075fb685f7fa96c3061.php
│  │     ├─ 4b02966312852c857d85737d86f1ad0c.php
│  │     ├─ 4cfcb62a8e4ff8f119c3e4f5804db580.php
│  │     ├─ 4e703448810f8e5037ed8b5ddc405921.php
│  │     ├─ 4fe5ad2a613812b642fefb5f24b6daac.php
│  │     ├─ 500d01f21d7c1abc8947d1e5d8e3dc19.php
│  │     ├─ 546af1db5ece97fdb574425c43f41884.php
│  │     ├─ 547f8d9a0b438b600b5a36c928c02ce0.php
│  │     ├─ 5492c1d58185d859a66ce3ec743c9a77.php
│  │     ├─ 5516b872a561308b5344f2e820772eb5.php
│  │     ├─ 557b633442ded478cc9594e0c564e39e.php
│  │     ├─ 5993671e88c975dad33631da88bb2278.php
│  │     ├─ 59cdba17bf001d5093906e950074cf08.php
│  │     ├─ 5d37a4ca9870601cb4988edc5cef9148.php
│  │     ├─ 5ecfd70cd2a04f41e72532d41aa8db3a.php
│  │     ├─ 5f62812c42d99648a1b00be5ccb7a30a.php
│  │     ├─ 62ed18fddbe614d8138e9505922d0db9.php
│  │     ├─ 6b26d0938a90649f19eb17b3670a97ed.php
│  │     ├─ 6c27cf82d8b3988d54c04cf0d2b0c888.php
│  │     ├─ 71f8026cc37a98fb2e2d37740b1aceb4.php
│  │     ├─ 748f028e98a51d75d548913264b4bda9.php
│  │     ├─ 7511bdcf8d107f3d2972e21baad8924f.php
│  │     ├─ 7ef83678c289b21674b3bb586780f42d.php
│  │     ├─ 839bb6381d40f6e675de50d87ff22f82.php
│  │     ├─ 894fcfe68d9aea6d6c692b7789268527.php
│  │     ├─ 89f291def1a0ebc0b37c9a2b7c741343.php
│  │     ├─ 8adb1b0a0a5f8c507cf1ed6300db9c95.php
│  │     ├─ 8bea43e261e942172478801bcaa8f1e8.php
│  │     ├─ 8fe29b84d77c9a93ad7df3cbbf1880fe.php
│  │     ├─ 939c5e947080cd5bdef38001f6da3f87.php
│  │     ├─ 941f001d9bb460e5afa7d2a0baaaf3e9.php
│  │     ├─ 9b0533afb0416efb6fecc9e8486fecdb.php
│  │     ├─ 9b48bed5333fbaeaa3cc4221ad52a302.php
│  │     ├─ 9dfd8d0e373b53b0d2b52e0c94448d30.php
│  │     ├─ a757386f211c08a15109f9ede817d415.php
│  │     ├─ a9064c175786a659cddeb50bfd7e4e78.php
│  │     ├─ a984c7e5da443b72adf609eee0f0d5d3.php
│  │     ├─ aba616394b74c94a724edaee20ea0b07.php
│  │     ├─ b0798ccfe8ee76d8205f461e40d5e82e.php
│  │     ├─ b42b23c5a37d27063ab518605fbf2323.php
│  │     ├─ b519df885b43a9bcdad0279b2017fdda.php
│  │     ├─ b6a07a14112a2a507bf79fdee2d76171.php
│  │     ├─ b745ad0f4b1c7d88e46f034200696e69.php
│  │     ├─ b7d381c2fc9abb0bf522d1e91f95337b.php
│  │     ├─ b9768a27ffc91b11002f9212ed7c1179.php
│  │     ├─ c60591a8468c358f5f1272cfa989467b.php
│  │     ├─ c7cc75349041d85240b052ce86b5fb66.php
│  │     ├─ c9bcb82325a3e186a58a29a1e414bef7.php
│  │     ├─ d2096b1044c4f0c0de951ead2669119b.php
│  │     ├─ d2dbd28092bb9073433d4e90e46b717d.php
│  │     ├─ d971af0dae9acb2c22838b795eecc9b7.php
│  │     ├─ ddc08a3b2ad4ec317f360e7b41496917.php
│  │     ├─ e17c9fdc78083748ade6c91cb96ef2ac.php
│  │     ├─ e4aa4a67969a283fe175fd9030f8a159.php
│  │     ├─ e66225e46145a6805b8f52f24d527783.php
│  │     ├─ e75ed2d41c2ace23da814883f7233c2c.php
│  │     ├─ ea67d7d2be842ce29718193bf402f442.php
│  │     ├─ eb20c954696a885d5dd20b8171ae7caa.php
│  │     ├─ f57d00b7193a2415e39e2b2f314545d3.php
│  │     ├─ fc71c62536c0e17b0e50d23e762c7c66.php
│  │     └─ feaa07115653e674b8b2394d4fe1bc56.php
│  └─ logs
├─ tests
│  ├─ Feature
│  │  └─ ExampleTest.php
│  ├─ TestCase.php
│  └─ Unit
│     └─ ExampleTest.php
└─ vite.config.js

```