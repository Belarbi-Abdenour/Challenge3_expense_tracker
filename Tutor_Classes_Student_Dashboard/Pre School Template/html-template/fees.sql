CREATE TABLE IF NOT EXISTS fees(ID_F INT,ID_S INT,ID_C INT,Amount FLOAT(10,2),Status INT);
ALTER TABLE fees ADD CONSTRAINT fees_primary_key PRIMARY KEY(ID_F);