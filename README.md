# CS425-project - D3 Groceries

The goal is to build an online grocery store that operates in the US. The grocery store will use a database backend to store information about products, availability of products in the stock, and customers of the store.


### 1 Project Timeline

Project has three deliverables:
- [x] ER-Model

![ER Model](/home/dnov/Desktop/CS425/CS425-project/diagrams/er_model.png)

- [ ] Relational Schema

- [ ] Application 

### Requirements

**Customers should be able to:**
1. Search for products
2. Look up product information
3. Create an account and able to change their preferences.



<u>**Types of users**</u>
1. **Customers:**
- name
- address
- credit card
- account balance

2. **Staff:**
- name
- address
- salary
- job title


**Store Information:**
1. Product
	- size (ft<sup>3</sup>)
	- type (food / alcohol)
  
2. Warehouse
	- address
	- capacity (ft<sup>3</sup>)

3. Stock
	-inventory (per warehouse)
    
4. Product pricing
	- product price(per state)
   
5. Order
	- products
	  - associated quantity
	- status
	  - issues
	  - send
	  - received

