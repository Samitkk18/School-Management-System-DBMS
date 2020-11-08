  <!-- Trigger for Insert after inserting a new book -->
<!-- INSERT INTO logs VALUES(null, NEW.book_id, 'Inserted', NOW()); -->


<!-- CREATE TRIGGER `InsertLog` AFTER INSERT ON `library` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.book_id, 'Inserted', NOW()); -->


<!-- Trigger for Update after updating a new book -->
<!-- INSERT INTO logs VALUES(null, NEW.book_id, 'Updated', NOW()); -->


<!-- CREATE TRIGGER `UpdateLog` AFTER UPDATE ON `library` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.book_id, 'Updated', NOW()); -->


<!-- Trigger for Delete before deleting a new book -->
<!-- INSERT INTO logs VALUES(null, OLD.book_id, 'Deleted', NOW()); -->


<!-- CREATE TRIGGER `DeleteLog` BEFORE DELETE ON `library` FOR EACH ROW INSERT INTO logs VALUES(null, OLD.book_id, 'Deleted', NOW()); -->
