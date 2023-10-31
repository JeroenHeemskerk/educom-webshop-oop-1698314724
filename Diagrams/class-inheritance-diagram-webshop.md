```mermaid
---
title: Class Inheritance Diagram - Webshop
---
classDiagram
    note "+ = public, - = private, # = protected"
    %% A <|-- B means that class B inherits from class A %%
    HtmlDoc <|-- BasicDoc

    BasicDoc <|-- HomeDoc
    BasicDoc <|-- AboutDoc
    BasicDoc <|-- FormDoc
    BasicDoc <|-- ProductServiceDoc

    FormDoc <|-- ContactDoc
    FormDoc <|-- LoginDoc
    FormDoc <|-- RegisterDoc
        
    ProductServiceDoc  <|-- WebshopDoc
    ProductServiceDoc  <|-- ProductDoc
    ProductServiceDoc  <|-- ShoppingcartDoc


    class HtmlDoc{
       +show()
       -showHtmlStart()
       -showHeaderStart()
       #showHeaderContent()
       -showHeaderEnd()
       -showBodyStart()
       #showBodyContent()
       -showBodyEnd()
       -showHtmlEnd()
    }
    class BasicDoc{
        #data 
        +__construct(mydata)
        #showHeaderContent()
        -showTitle()
        -showCssLinks()
        #showBodyContent()
        #showHeader()
        -showMenu()
        #showContent()
        -showFooter()
    }
    class HomeDoc{
        #showHeader()
        #showContent()
    }

    class AboutDoc{
        #showHeader()
        #showContent()
    }


    class FormDoc{
        #showFormStart()
        #showFormField()
        #showFormEnd()
    }

    class ContactDoc{
        #data 
        #showHeader()
        #showContent()
        #getPageData()
        #validateForm()
    }

    class LoginDoc{
        #data 
        #showHeader()
        #showContent()
        #getPageData()
        #validateForm()
    }
    class RegisterDoc{
        #data 
        #showHeader()
        #showContent()
        #getPageData()
        #validateForm()
    }




    class ProductServiceDoc{
        #initializePageData()
        #handleActions()
        #getPageData()
        #showHeader()
        #showContent()
    }
    class WebshopDoc{
        #data 
        #initializePageData()
        #handleActions()
        #getPageData()
        +showHeader()
        +showContent()
        -showProductCard()
    }
    class ShoppingcartDoc{
        #data 
        #initializePageData()
        #handleActions()
        #getPageData()
        +showHeader()
        +showContent()
        -showProductLine()
    }
    class ProductDoc{
        #data 
        #initializePageData()
        #handleActions()
        #getPageData()
        +showHeader()
        +showContent()
        -showProduct()
    }



