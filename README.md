after clone:

    make a database called "easy_drive"
    run install.bat

after each branch switch or data pull:

    run update.bat

when APP_DEBUG is set to true in the .env file a seeder will insert testdata to the database.
there will also be 3 users that get generated:

    owner@test.nl
    instructor@test.nl
    student@test.nl
    password all accounts: Test123$

when APP_DEBUG is set to false in the .env file only necessary data will be seeded.
