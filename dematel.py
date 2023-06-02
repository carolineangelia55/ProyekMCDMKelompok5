import pandas as pd
import numpy as np


data = pd.read_excel('data.xlsx')

title = 0
#  Mencari nilai total untuk setiap baris
total = [0 for i in range (len(data))]
for i in (data):
    if (title != 0):
        count = 0
        for j in (data[i]):
            total[count] += j
            count += 1 
    title += 1

# Mencari nilai tertinggi untuk total baris
max = 0
for i in (total):
    if (i>max):
        max = i

# Melakukan normalisasi
title = 0
for i in (data):
    if (title != 0):
        for j in range (len(data[i])):
            data[i][j] = data[i][j]/max
    title += 1

# I-Y
temp = data.copy()
title = 0
for i in (data):
    if (title != 0):
        for j in range (len(data)):
            if ((title-1)==j):
                temp[i][j] = 1-data[i][j]
            else:
                temp[i][j] = 0-data[i][j]
    title += 1

# Mengubah dictionary menjadi array untuk diubah menjadi array numpy
title = 0
arr = [[] for i in range (len(data))]
saveTemp = [[] for i in range (len(data))]
for i in (temp):
    if (title != 0):
        count = 0
        for j in range (len(temp)):
            arr[count].append(temp[i][j])
            saveTemp[count].append(data[i][j])
            count += 1
    title += 1
arr = np.array(arr)
saveTemp = np.array(saveTemp)

# Invers matriks
arr = np.linalg.inv(arr)

# Mengalikan dua matriks
res = np.dot(saveTemp, arr)

# Menghitung Ri dan Ci
Ri = [0 for i in range (len(data))]
Ci = [0 for i in range (len(data))]
for i in range (len(res)):
    for j in range (len(res[i])):
        Ri[i] += res[i][j]
        Ci[j] += res[i][j]

# Menghitung Ri+Ci dan Ri-Ci
penambahan = [0 for i in range (len(data))]
pengurangan = [0 for i in range (len(data))]
for i in range (len(Ci)):
    penambahan[i] = Ri[i] + Ci[i]
    pengurangan[i] = Ri[i] - Ci[i]

# Mencari average
total = 0
count = 0
for i in (res):
    for j in (i):
        total += j
        count += 1
average = total/count

# Mengambil nama setiap kriteria untuk mempermudah
kriteria = []
title = 0
for i in (data):
    if (title != 0):
        kriteria.append(i)
    title += 1

# Mengurutkan kriteria dengan pengaruh paling besar
urutan = kriteria.copy()
for i in range (len(penambahan)):
    for j in range (i, len(penambahan)):
        if (penambahan[j]>[penambahan[i]]):
            temp = penambahan[i]
            penambahan[i] = penambahan [j]
            penambahan[j] = temp
            temp = urutan[i]
            urutan[i] = urutan[j]
            urutan[j] = temp

# Menentukan identitas setiap kriteria
identitas = [[] for i in range (len(data))]
for i in range (len(pengurangan)):
    temp = []
    temp.append(kriteria[i])
    if (pengurangan[i]<0):
        temp.append("Effect")
    else:
        temp.append("Cause")
    identitas[i] = temp

# Menentukan relasi yang memiliki pengaruh signifikan
relasi = []
for i in range (len(res)):
    for j in range (len(res[i])):
        temp = []
        if (res[i][j]>average and i!=j):
            temp.append(kriteria[i])
            temp.append(kriteria[j])
            temp.append(res[i][j])
            relasi.append(temp)

print(urutan)
print(identitas)
print(relasi)
