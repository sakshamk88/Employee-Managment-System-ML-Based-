# -*- coding: utf-8 -*-
"""
Created on Sun Feb  3 05:31:28 2019

@author: hp
"""

# Random Forest Regression

# Importing the libraries
import seaborn as sn
import numpy as np
import matplotlib.pyplot as plt
import pandas as pd

# Importing the dataset
dataset = pd.read_csv('efficiency.csv')
X = dataset.iloc[:, 8:11].values
y = dataset.iloc[:, 14].values

# Splitting the dataset into the Training set and Test set
from sklearn.cross_validation import train_test_split
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size = 0.2, random_state = 0)

# Feature Scaling
"""from sklearn.preprocessing import StandardScaler
sc_X = StandardScaler()
X_train = sc_X.fit_transform(X_train)
X_test = sc_X.transform(X_test)
sc_y = StandardScaler()
y_train = sc_y.fit_transform(y_train)"""

# Fitting Random Forest Regression to the dataset
from sklearn.ensemble import RandomForestRegressor
regressor = RandomForestRegressor(n_estimators = 3, random_state = 0)
regressor.fit(X, y)

# Predicting a new result
y_pred = regressor.predict(X_test)

print(regressor.score(X_test,y_test))
# Visualising the Random Forest Regression results (higher resolution)


plt.scatter(dataset['Average'], y, color = 'red')
plt.xlabel('Averagetime/Week')
plt.ylabel('Efficiency')
plt.show()


plt.scatter(dataset['feedback'], y, color = 'red')
plt.xlabel('FeedBack')
plt.ylabel('Efficiency')
plt.show()


plt.scatter(dataset['Average Timetaken'], y, color = 'red')
plt.xlabel('Average time taken')
plt.ylabel('Efficiency')
plt.show()

sn.distplot(y,kde='False',bins=60)
sn.jointplot(x="Average Timetaken",y="efficiency in %",data=dataset,kind="reg")
sn.boxplot(x="Average Timetaken",y="efficiency in %",data=dataset,hue="Outliers")