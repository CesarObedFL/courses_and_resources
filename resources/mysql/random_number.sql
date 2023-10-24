
-- Obtaining random value between in the range [ A, (B-1) ] using RAND Function. 

SELECT FLOOR(A + RAND()*(B-A)) AS random_number;