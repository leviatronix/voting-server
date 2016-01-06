# voting-server
PHP and MySQL server to provide CKHS with election voting capabilities

## How to use

### Initialization
For use on a Windows machine, install WAMP server.
The username for the mysqldb is root and the password is blank
Then initialize the database with test data in vote.sql
Feel free to clear unwanted test data
The admin username/password defaults to admin/admin but feel free to change that in the database

### Admin Panel
Use the import option to import the roster of students who are eligible to vote. This file must be tab-separated and have no empty last line. Use the voter.tab file as an example.
Use the set up election option to create all the positions and candidates.
You may now let students start voting and can check the results on the compiled results option.

## Notes
Smarty's template compliling is really janky and to fix a problem I even had to go into a compiled template and manually fix an iteration error, so if vote.tpl recompiles, it will have the same error again.
