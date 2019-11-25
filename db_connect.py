import psycopg2
 
def connect():
    """ Connect to the PostgreSQL database server """
    conn = None
    try:
        # connect to the PostgreSQL server
        print('Connecting to the Grocery Store Database...')
        conn = psycopg2.connect(
            dbname="grocerydb",
            user="postgres",
            host="localhost",
            port="5432",
            password="Leesimaol2$")

        # create a cursor
        cur = conn.cursor()
        
        # execute a statement
        print('Testing Postgres + Python: ')
        cur.execute('SELECT * from stock;')
 
        # display the PostgreSQL database server version
        db_version = cur.fetchone()
        print(db_version)
       
       # close the communication with the PostgreSQL
        cur.close()
    except (Exception, psycopg2.DatabaseError) as error:
        print(error)
    finally:
        if conn is not None:
            conn.close()
            print('Database connection closed.')
 
 
if __name__ == '__main__':
    connect()